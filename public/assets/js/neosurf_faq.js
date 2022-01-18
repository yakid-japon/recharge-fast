var Question = function(){
    this.title = null;
    this.anwser = null;
    this.keywords = {};
    this.scores = {};
    this.id = null;
    
    Question.prototype.getKeywords = function(){
        return this.keywords;
    };
    
    Question.prototype.getAnswer = function(){
        return this.answer;
    };
    
    Question.prototype.getTitle = function(){
        return this.title;
    };
    
    Question.prototype.getId = function(){
        return this.id;
    };
    
    Question.prototype.getQuestionScore = function(searched){
        if(this.scores.hasOwnProperty(searched)){
            return this.scores[searched];
        }
        var score = 0;
        
        var keywords = this.getKeywords();
        for(var i=0; i<keywords.length; i++){
            var keyword = keywords[i];
            score += this.getKeywordScore(keyword, searched);
        }
        
        score += this.getTitleScore(searched);
        
        this.scores[searched] = score;
        return score;
    };
    
    Question.prototype.getTitleScore = function(searched){
        var score = 0;
        
        for(var i=0; i<searched.length; i++){
            var query = searched[i];
            if(query === ""){
                continue;
            }
            query = query.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
            var regexp = new RegExp(query, 'i');
            if(regexp.test(this.getTitle())){
                score++;
            }
        }
        
        return score;
    };
    
    Question.prototype.getKeywordScore = function(keyword, searched){
        var score = 0;
        
        for(var i=0; i<searched.length; i++){
            var query = searched[i];
            if(query === ""){
                continue;
            }
            query = query.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
            var regexp = new RegExp(query, 'i');
            if(regexp.test(keyword)){
                score++;
            }
        }
        
        return score;
    };
};

var QuestionList = function(){
    this.list = [];
    this.contactText = "";
    this.contactUrl = "";
    
    QuestionList.prototype.addQuestion = function(question){
        if(question instanceof Question){
            question.id = this.list.length;
            this.list.push(question);
        }
    };
    
    QuestionList.prototype.addQuestions = function(questions){
        for(var i in questions){
            var question = questions[i];
            var temp = new Question();
            temp.answer = question.response;
            temp.keywords = question.keywords;
            temp.title = question.question;
            this.addQuestion(temp);
        }
    };
    
    QuestionList.prototype.search = function(searched){
        var found = [];
        
        for(var i=0; i<this.list.length; i++){
            var question = this.list[i];
            var score = question.getQuestionScore(searched);
            if(score > 0){
                found.push(question);
            }
        }
        
        found.sort(function(a,b){
            return b.getQuestionScore(searched) - a.getQuestionScore(searched);
        });
        
        return found;
    };
    
    QuestionList.prototype.prepareQuestion = function(question, searched){
        if(!(question instanceof Question)){
            return null;
        }
        
        var title = question.getTitle();
        
        for(var i=0; i<searched.length; i++){
            var query = searched[i];
            if(query === ""){
                continue;
            }
            query = query.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
            var regexp = new RegExp(query, 'g');
            var title = title.replace(regexp,"<b>"+query+"</b>");
            
        }
        
        var div = $("<div>").addClass("faq-box__question-list__question")
            .html(title)
            .data('title',question.getTitle())
            .data('question-id',question.getId());
    
        return div;
    };
    
    QuestionList.prototype.displayQuestion = function(questionId){
        var question = this.list[questionId];
        
        var div = $("<div>");
        var title = $("<div>").addClass("faq-box__answer--title").html(question.getTitle());
        var answer = $("<div>").addClass("faq-box__answer--answer").html(question.getAnswer());
        
        $(div).append(title).append(answer);
        
        return div;
    };
    
    QuestionList.prototype.setContact = function(contactText, contactUrl){
        this.contactText = contactText;
        this.contactUrl = contactUrl;
    };
    
    QuestionList.prototype.getContact = function(){
        var content = "<a href='"+this.contactUrl+"'>"+this.contactText+"</a>";    
        var div = $("<div>").addClass("faq-box__question-list__question")
            .html(content);
    
        return div;
    };
};

$(document).ready(function(){
    var faq_original_height = 69;
    
    $("#faq-box #faq-box__input").val("");
    $("#faq-box #faq-box__input").data('question-id',null);

    //Event when you input a character in the input
    $("#faq-box #faq-box__input").keyup(function () {
        var value = $(this).val();

        $("#faq-box #faq-box__question-list").hide();
        $("#faq-box #faq-box__wrapper-answer").hide();
        $("#faq-box .btn-find").show();

        if(value === ""){
            $("#faq-box #faq-box__input-wrapper .erase .erase-image").hide();
            $("#faq-box .faq-box--content #faq-box__wrapper-header").css('height', faq_original_height+"px");
            return;
        }

        $("#faq-box #faq-box__input-wrapper .erase .erase-image").show();
        if(value.length < 3){ //We only search when we have at least 3 characters
            $("#faq-box .faq-box--content #faq-box__wrapper-header").css('height', faq_original_height+"px");
            return;
        }

        var searched = value.split(" ");

        var relatedQuestions = faq_questionList.search(searched);
        var limit = 3;
        var nbQuestions = 0;
        $("#faq-box #faq-box__question-list").html("");
        for (var i = 0; i < relatedQuestions.length; i++) {
            var div = faq_questionList.prepareQuestion(relatedQuestions[i], searched);
            if (div !== null) {
                //Event when you select an answer
                $(div).click(function(){
                    var questionId = $(this).data('question-id');
                    var div = faq_questionList.displayQuestion(questionId);
                    $("#faq-box #faq-box__question-list").hide(1000);
                    $("#faq-box .btn-find").hide(1000);

                    $("#faq-box .faq-box--content #faq-box__wrapper-header").css('height',faq_original_height+"px");
                    $("#faq-box__answer").html("").append(div).show();
                    $("#faq-box #faq-box__wrapper-answer").show(1000);
                    
                    
                    $("#faq-box #faq-box__input").val($(this).data('title'));
                    $("#faq-box #faq-box__input").data('question-id',questionId);
                    
                });

                $("#faq-box #faq-box__question-list").show();
                $("#faq-box__question-list").append(div);
                nbQuestions++;
                if(nbQuestions === limit){
                    break;
                }
            }
        }
        
        if(nbQuestions === 0){
            var div = faq_questionList.getContact();
            $("#faq-box #faq-box__question-list").show();
            $("#faq-box__question-list").append(div);
            nbQuestions++;
        }
        
        var newHeight = faq_original_height + 30*nbQuestions;
        $("#faq-box .faq-box--content #faq-box__wrapper-header").css('height', newHeight+"px");
    });
    
    $("#faq-box").mouseenter(function(){
        if($("#faq-box").data('state')){
            return;
        }
        $("#faq-box").animate({width:'450px'},1000).css('overflow','visible');
        $("#faq-box .faq-box--content").animate({width:'480px'},1000, function(){
            $("#faq-box .faq-box__header .close__button").show();
        });
        $("#faq-box").data('state',1);
    });
    
    //Event when you click the find button
    $("#faq-box .btn-find").click(function(){
        var questionId = $("#faq-box #faq-box__input").data('question-id');
        if(questionId === null){
            questionId = $("#faq-box #faq-box__question-list").children().first().data('question-id');
            if(questionId === undefined){
                return;
            }
        }
        var div = faq_questionList.displayQuestion(questionId);
        
        $("#faq-box #faq-box__question-list").hide(1000);
        $("#faq-box .btn-find").hide(1000);
        
        $("#faq-box .faq-box--content #faq-box__wrapper-header").css('height',faq_original_height+"px");
        $("#faq-box__answer").html("").append(div).show();
        $("#faq-box #faq-box__wrapper-answer").show(1000);
        $("#faq-box #faq-box__input").data('question-id',null);
    });

    //Event when you click the input erase button
    $("#faq-box #faq-box__input-wrapper .erase").click(function(){
        $("#faq-box #faq-box__input").val("");
        $("#faq-box #faq-box__question-list").hide();
        $("#faq-box #faq-box__input-wrapper .erase .erase-image").hide();
        $("#faq-box .faq-box--content #faq-box__wrapper-header").css('height',faq_original_height+"px");
    });

    //Event when you click the reduce button of the faq box
    $("#faq-box .faq-box__header .close__button").click(function(){
        $("#faq-box .faq-box__header .close__button").hide();
        $("#faq-box #faq-box__question-list").hide(1000);
        $("#faq-box #faq-box__wrapper-answer").hide(1000, function(){
            $("#faq-box .btn-find").show(1000);
        });
        $("#faq-box .faq-box--content").animate({width:'330px'},1000);
        $("#faq-box").animate({width:'300px'},1000, function(){
            $("#faq-box").data('state',0);
        }).css('overflow','visible');
    });

    $("#faq-box .faq-box__header .close").click(function(){
        $('#faq-box').remove();
    });
});

var faq_getContactPage = function(){
    var pathName = window.location.pathname;
    var paths = pathName.split("index.html");
    
    if(paths.length < 2){
        return "https://www.neosurf.com/fr_FR/application/contact/client/form";
    }
    
    var url = "https://www.neosurf.com/";
    
    var localeRegex = new RegExp(/^[a-z]{2}_[A-Z]{2}$/);
    if(localeRegex.test(paths[1])){
        url += paths[1];
    } else {
        url += "fr_FR";
    }
    
    url += "/application/contact/client/form";
    
    return url;
};