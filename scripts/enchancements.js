/**
 * Author       : Justin San | ********
 * Target       : product.html
 * Purpose      : To enhance user experience
 * Created      : 5-apr-2020
 * Last updated : 6-may-2020
 * Credits      : N/A?
 **/
"use strict";
/*GLOBAL VAR USED to create elements*/
var paragraph = document.getElementsByTagName("p");
var heading2 = document.getElementsByTagName("h2");
var list = document.getElementsByTagName("li");
var nav = document.getElementsByTagName("nav");

/*
TIMER FUNCTION HAS BEEN MOVED TO PAYMENT.JS

*/

/*RE-WRITE THE CONTENT ON FAN FAVOURITE:*/
/*SCROLL FUCNTION PREVIOUS */
function fanFavouriteScrollPrev(){
    var bookCovers = ["images/bookCoverImages/Three_Winged_Badger.jpg", "images/bookCoverImages/The_Scary_Toad.jpg", "images/bookCoverImages/The_Solid_Kettle.jpg"]; 
    var headingsText = ["The Three Winged Badger", "The Scary Toad", "The Solid Kettle", "Fantasy:"];
    var paragraphText = ["Alex Gabriel", 
                        `Dolly Wishmonger had always loved cosy Paris with its zealous, zesty zoos. It was a place where she felt afraid. She 
                        was a remarkable, funny, tea drinker with ginger abs and tall toes. Her friends saw her as a whispering, weary writer. 
                        Once, she had even revived a dying, chicken. That's the sort of woman he was. Dolly walked over to the window and
                        reflected on her backward surroundings. The wind blew like eating blue bottles. Then she saw something in the distance, 
                        or rather someone. It was the figure of Forest Raymond. Forest was a violent lover with brunette abs and greasy toes.
                        Dolly gulped. She was not prepared for Forest. As Dolly stepped outside and Forest came closer, she could see the plain 
                        smile on his face.`, 
                        "Fun fact about this book:", 
                        
                        "Mona Petersen", 
                        `Raymond England looked at the cursed kettle in his hands and felt sleepy.
                        He walked over to the window and reflected on his cosy surroundings. He had always loved chilly Cape Town with its 
                        cooperative, curried cliffs. It was a place that encouraged his tendency to feel sleepy. Then he saw something in the 
                        distance, or rather someone. It was the figure of Matthew MacDonald. Matthew was a malicious queen with hairy warts and 
                        skinny eyebrows. Raymond gulped. He glanced at his own reflection. He was a deranged, lovable, beer drinker with moist 
                        warts and chubby eyebrows. His friends saw him as a quickest, quaint queen. Once, he had even rescued a silky chicken 
                        from a burning building. But not even a deranged person who had once rescued a silky chicken from a burning building, 
                        was prepared for what Matthew had in store today.`, 
                        "Fun fact about this book:", 
                        
                        "Amelia Pond", 
                        `One morning in a house in Africa, Mary Cockle opens a gift from her aunt, Georgina Barker, and Mary knows their lives 
                        will never be the same again. Whilst trying to rebuild her life, Mary witnesses a crime that leads her to question a 
                        new relationship. She becomes obsessed with enigmatic stranger Reginald Thunder. What is his connection to Georgina, 
                        and why has he turned up now? Mary's behaviour becomes increasingly erratic as she struggles to unravel the truth and 
                        the significance of a minuscule sausage, all whilst battling to cope with addiction. Every day, Mary gets closer to the 
                        truth. And the closer she gets, the more unbelievable it seems.`, 
                        "Fun fact about this book:"];
    var listText =["This is one of the most intresting books I've read so far", "The content is actually amazing", "Three winged badger died at the end",
                   "The scary toad isn't scary at all", " Toads are found on all continents except Antarctica", "The word scary only implies to those poisonous toad"];
    for(var x = 0; x < paragraphText.length;x++){
        heading2[x+1].innerHTML = headingsText[x];
        paragraph[x].innerHTML = paragraphText[x];
        document.getElementById("bookCover0"+x).src = bookCovers[x];
        list[x].innerHTML = listText[x];
    }
}

/*RE-WRITE THE CONTENT ON FAN FAVOURITE:*/
/*SCROLL FUCNTION NEXT */
function fanFavouriteScrollNext(){
    var bookCovers = ["images/bookCoverImages/Pleasure_of_a_Werewolf.jpg", "images/bookCoverImages/The_Art_of_Criminials.jpg", "images/bookCoverImages/Galactic_Wars.jpg"]; 
    var headingsText = ["Pleasure of a Werewolf", "The Art of Criminals", "Galactic Wars", "Fantasy:"];
    var paragraphText = ["Jackie Yu", 
                        `William Parkes suspected something was a little off when his giving dear tried to pleasure him when he was just six 
                        years old. Nevertheless, he lived a relatively normal life among other humans. It wasn't until he bumped into the 
                        devilishly chubby werewolf, Jessica Gump, that his life finally began to make sense.However, Jessica proved to be 
                        fluffy and seemed to have an unhealthy obsession with laughing. William soon learnt that Jessica had taken an oath 
                        never to punch a human being. When William's giving dear is injured in a magic accident, William realises his own life 
                        is at risk.Despite Jessica's angry eyes and grumpy disposition, William finds himself falling for the werewolf. Only 
                        fate will decided whether she kills or protects him.One night, a gargoyle appears before William and warns him of a 
                        darkness within Jessica. The gargoyle gives William the stripy sword - the only weapon that can defeat a chubby werewolf.`, 
                        "Fun fact about this book:", 
                        
                        "Duck McQuaff", 
                        `Harmful bacteria has destroyed the world as we know it. The year is 2080. London is a terrifying place ruled by criminals. 
                        Once glorious, Buckingham Palace is now buried. Courageous navigator, Lord Phillip Greenway is humanity's only hope. Phillip 
                        finds the courage to start a secret revolutionary organization called Nize. The fight is jeopardised when Phillip is tricked 
                        by stupid teacher, Miss Wenna Parker, and injures his hand. Armed with oxygen tanks and Guns, Nize try their best to save 
                        mankind, but can they defeat predatory criminals and restore Buckingham Palace to its former glory?`, 
                        "Fun fact about this book:", 
                        
                        "Chirstoph M. Northern", 
                        `A long, long time ago in a wicked, wicked galaxy... After leaving the deserted planet Saturn, a group of goblins fly toward a 
                        distant speck. The speck gradually resolves into a backward, space heights. Civil war strikes the galaxy, which is ruled by 
                        Tony Hemingway, a vast troll capable of burglary and even cruelty. Terrified, a warped giant known as Dick Barker flees the 
                        Empire, with his protector, Joshua Bogtrotter. They head for Oxford on the planet Venus. When they finally arrive, a fight 
                        breaks out. Bogtrotter uses his wicked gun to defend Dick. Bogtrotter and Giant Dick decide it's time to leave Venus and steal 
                        a digger to shoot their way out. They encounter a tribe of teens. Bogtrotter is attacked and the giant is captured by the teens 
                        and taken back to Oxford.`, 
                        "Fun fact about this book:"];
    var listText =["This is one of the most intresting books I've read so far", "The content is actually amazing", "Three winged badger died at the end",
                   "The scary toad isn't scary at all", " Toads are found on all continents except Antarctica", "The word scary only implies to those poisonous toad"];
    for(var x = 0; x < paragraphText.length;x++){
        heading2[x+1].innerHTML = headingsText[x];
        paragraph[x].innerHTML = paragraphText[x];
        document.getElementById("bookCover0"+x).src = bookCovers[x];
        list[x].innerHTML = listText[x];
    }
}
/*USE TO INITIALISED*/
function init(){
    var previousButton = document.getElementById("previous");
    var nextButton = document.getElementById("next");
    previousButton.onclick = fanFavouriteScrollPrev;
    nextButton.onclick = fanFavouriteScrollNext;
}
/*LOAD THE SCRIPT*/
window.onload = init;