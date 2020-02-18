

var liked = false;
var disliked = false;
var commentsRevealed = false;

window.addEventListener('load', () => {
    const articleId = document.location.search.replace(/^.*?\=/,'');
    loadArticle(articleId);


     //Adding event listener
     window.addEventListener('click', (e) => {
        const t = e.target;
        switch (t.id) {
            case 'Like-btn':
                like(articleId, getUpdate, updateArticle);
            break;

            case 'Dislike-btn':
               
            break;
        
            
        }

      });

});







function loadArticle(id){
    var xhr = new XMLHttpRequest();
    xhr.open('GET','xhr.inc.php?instruct=getArticle&info='+id, true);
    xhr.onload = function(){
        if(this.status == 200){
          let article = JSON.parse(this.responseText);
          console.log(article);
          drawArticle(article);  
        }
    }
    xhr.send();
}


function drawArticle(article){
    let titleHolder = document.getElementById('title');
    let authorHolder = document.getElementById('author');
    let readsHolder = document.getElementById('reads');
    let likesHolder = document.getElementById('Likes');
    let dislikesHolder = document.getElementById('Dislikes');
    let contentHolder = document.getElementById('content');

    titleHolder.innerText =  article[0].article_title;
    authorHolder.innerText = article[0].author_name;
    readsHolder.innerText  = 'Reads: '+article[0].article_reads;
    likesHolder.innerText = article[0].article_likes;
    dislikesHolder.innerText = article[0].article_dislikes;
    contentHolder.innerText  = article[0].article_content;
}

 function like(id,callback, callback2){
           if(liked === false){
               let res;
               var xhr = new XMLHttpRequest();
               xhr.open('GET','xhr.inc.php?instruct=likeArticle&info='+id, true);
               xhr.onload = function(){
                   if(this.status == 200){
                      //console.log(this.responseText);
                      res = this.responseText;
                      console.log(res);
                      if(res === 'success'){
                          callback(id,callback2);
                      }
                   }
               }
               xhr.send();
           }
  
           
    }

function getUpdate(id,callback){
    let article;
    var xhr = new XMLHttpRequest();
    xhr.open('GET','xhr.inc.php?instruct=getArticle&info='+id, true);
    xhr.onload = function(){
        if(this.status == 200){
           //console.log(this.responseText);
           article = JSON.parse(this.responseText);
           callback(article[0].article_reads, article[0].article_likes,article[0].article_dislikes);
        }
    }
    xhr.send();
}        

function updateArticle(reads, likes, dislikes){
    let readHolder = document.getElementById('reads');
    let likeHolder = document.getElementById('Likes');
    let dislikeHolder = document.getElementById('Dislikes');
    readHolder.innerText = reads;
    likeHolder.innerText = likes;
    dislikeHolder.innerText = dislikes;
}