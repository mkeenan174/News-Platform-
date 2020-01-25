import './person.js';

import article from './js/article.js';
import person from './person.js';
import comment from './js/comment.js';



window.addEventListener('load', () => {
    //logTest();
    getArticles(printer);
    getArticles(tilePainter, 'test-pen', 'small-tile');
    // talk();
    // var comments = SetUpComments();
    // var articles = SetupArticles();
    // renderItems(articles, 'article-pen');
    // renderItems(comments, 'comment-pen');
    // comments.forEach(comment => {
    //     console.log(comment);
    //     comment.buildComment('pen');
    // });
   var body = document.getElementById("doc-body");
   body.onclick = function (e) {
       let t = e.target.parentElement;
        if(t.className == 'small-tile'){
            console.log(t.id);
            gotoArticle(t.id);
        }
       

       
   }

});


function printer(data){
    console.log(data);
}


function getArticles(callback, location, type){
    let articles;
    var xhr = new XMLHttpRequest();
    xhr.open('GET','xhr.inc.php?instruct=getArticles', true);
    xhr.onload = function(){
        if(this.status == 200){
           articles = JSON.parse(this.responseText);
           callback(location, type, articles);
        }else{
            console.log('Article request Failed');
        }
        
    }

    xhr.send();
}

function logTest(){
    let instruct = 'Post value';
    var params = 'name='+instruct;

    var xhr = new XMLHttpRequest();
    xhr.open('Post', 'xhr.inc.php?.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function(){
      console.log(this.responseText);
    }
     xhr.send( params);
     console.log('Sent');
    
}


function talk(){
    let Ted = new person();
    Ted.speak();
}


function gotoArticle(id){
    console.log(id);
    window.document.location = 'articlepage.php'+'?article=' + id;
}


function tilePainter(location, type, objs){


    objs.forEach(item =>{


            //Setup elements
            var destination = document.getElementById(location);
            var tile = document.createElement('div');
            var title = document.createElement('h3');
            var author = document.createElement('h4');
            
            tile.id = item.article_id;
           


            //Set id
            



            //Attribute Switch
            switch (type) {
                case 'small-tile':
                    tile.className = 'small-tile'; 
                    title.innerText = item.article_title;
                    title.className = 'small-tile-title';
                    author.innerText = item.author_name;
                    author.className = 'small-tile-author';
                    break;
                
                    case 'medium-tile':
                        tile.className = 'medium-tile'; 
                        title.innerText = item.article_title;
                        tile.className = 'medium-tile-title';
                        author.innerText = item.article_title;
                        author.className = 'medium-tile-author';
                        break;    
            
               
            }
           
    
            //Appending elements
            tile.appendChild(title);
            tile.appendChild(author);
            destination.appendChild(tile);
            
            console.log('tile appended successfully');

        });

}