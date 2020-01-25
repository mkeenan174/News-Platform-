window.addEventListener('load', () => {
    var articleId = document.location.search.replace(/^.*?\=/,'');
    console.log(articleId);
    loadArticle(paintArticle, readArticle, articleId);     
    var body = document.getElementById('article-pen'); 



    body.addEventListener('click', (e) => {
        t = e.target;

        if(t.id == 'Dislike-btn' || t.id == 'Like-btn'){
            switch (t.id) {
                case 'Dislike-btn':
                       dislikeArticle(articleId);
                    break;
                
                case 'Like-btn':
                        likeArticle(articleId);
                    break;    
            
               
            }
        }
    });
});




function loadArticle(callback1, callback2, id){
        let article;
        var xhr = new XMLHttpRequest();
        xhr.open('GET','xhr.inc.php?instruct=getArticle&info='+id, true);
        xhr.onload = function(){
            if(this.status == 200){
               //console.log(this.responseText);
               article = JSON.parse(this.responseText);
               callback1(article); 
               callback2(id);
            }
        }
        xhr.send();
}


function readArticle(id){
    let res;
        var xhr = new XMLHttpRequest();
        xhr.open('GET','xhr.inc.php?instruct=readArticle&info='+id, true);
        xhr.onload = function(){
            if(this.status == 200){
               //console.log(this.responseText);
               res = this.responseText;
               console.log(res);
            }
        }
        
        xhr.send();
}

function likeArticle(id){
    let res;
        var xhr = new XMLHttpRequest();
        xhr.open('GET','xhr.inc.php?instruct=likeArticle&info='+id, true);
        xhr.onload = function(){
            if(this.status == 200){
               //console.log(this.responseText);
               res = this.responseText;
               console.log(res);
            }
        }
    
    xhr.send();
}


function dislikeArticle(id){
    let res;
        var xhr = new XMLHttpRequest();
        xhr.open('GET','xhr.inc.php?instruct=dislikeArticle&info='+id, true);
        xhr.onload = function(){
            if(this.status == 200){
               //console.log(this.responseText);
               res = this.responseText;
               console.log(res);
            }
        }
    
    xhr.send();
}
function printer(item){
    console.log(item);
}


function paintArticle(article){


    printer(article[0].article_title);

    var destination = document.getElementById('article-pen');
    var titleHolder = document.createElement('h2');
    var authorHolder = document.createElement('h4');
    var contentHolder = document.createElement('p');
    var readHolder = document.createElement('span');
    var likeHolder = document.getElementById('Likes');
    var dislikeHolder = document.getElementById('Dislikes');

    titleHolder.innerText = article[0].article_title;
    authorHolder.innerText = article[0].author_name;
    contentHolder.innerText = article[0].article_content;
    readHolder.innerText = article[0].article_reads;
    likeHolder.innerText = article[0].article_likes;
    dislikeHolder.innerText = article[0].article_dislikes;

    destination.appendChild(titleHolder);
    destination.appendChild(authorHolder);
    destination.appendChild(contentHolder);
    destination.appendChild(readHolder);
    
}