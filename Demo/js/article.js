export default class article{
    constructor(id,author, title, likes, dislikes, reads, text){
        this.id = id;
        this.author = author;
        this.title = title;
        this.likes =  likes;
        this.dislikes = dislikes;
        this.reads = reads;
        this.text = text;
        
    }


    aboutMe(){
        console.log('Article No:'+this.id+' by:'+this.author);
    }


    smallTile(location){
        //Setup elements
        var destination = document.getElementById(location);
        var tile = document.createElement('div');
        var title = document.createElement('h3');
        var author = document.createElement('h4');
        

        //Set attributes
        tile.className = 'small-tile'; 
        title.innerText = this.title;
        tile.className = 'small-tile-title';
        author.innerText = this.author;
        author.className = 'small-tile-author';

        //Appending elements
        tile.appendChild(title);
        tile.appendChild(author);
        destination.appendChild(tile);
        
        console.log('tile appended successfully');

    }

    

    


}