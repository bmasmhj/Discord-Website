const epochs = [
    ['year', 31536000],
    ['month', 2592000],
    ['day' , 86400],
    ['hour', 3600],
    ['minute', 60],
    ['second',1]
];

const getDuration = (timeAgoInSeconds) =>{
    for(let [name , seconds] of epochs){
        const interval = Math.floor(timeAgoInSeconds / seconds);
        if(interval >=1 ){
            return{
                interval : interval,
                epoch : name
            };
        }
    }
};

const timeAgo = (date) =>{
    const timeAgoInSeconds = Math.floor((new Date()- new Date(date))/1000);
    const{interval , epoch} = getDuration(timeAgoInSeconds);
    const suffix = interval == 1 ?'' : 's';
    return `${interval} ${epoch}${suffix} ago`;
}

let singlepost = () =>{
    fetch(`https://graph.facebook.com/v13.0/${pageids}?fields=full_picture,message,created_time,comments&access_token=${accesstoken}`)
    .then(response =>{
        return response.json()
    })
    .then (data =>{
        // var lenght = data['posts'].data.length;
        console.log(data);
            var messages = data.message;
            if(messages == undefined){
                var messages = "";
            }
            postss.innerHTML =  ` 
            <div class='col-md-8 '>
                <img loading=lazy class="w-100" src="${data.full_picture}" alt="Image">
            </div>
            <div class="col-md-4 text-white">
            <div class="media-body"><p class="m-0 d-inline"></p> 
            <small class="float-end"><span><i class="fas fa-globe-europe"></i> ${timeAgo(data.created_time)}</span></small>
                <h4 class="mt-2"> ${messages}</h4>
            </div> 
        `;
    
    })
    }
    

let facebook = () =>{
    fetch(`https://graph.facebook.com/v12.0/${pageid}?fields=posts%7Bid%2Cfull_picture%2Cmessage%2Ccreated_time%7D%2Cfollowers_count%2Cname%2Clikes%2Cpicture&access_token=${accesstoken}`)
    .then(response =>{
        return response.json()
    })
    .then (data =>{
            var lenght = data['posts'].data.length;
            console.log(data);  
            //follower counts
            // document.getElementById('folow').innerHTML = data.followers_count;

            //page name
            // document.getElementById('pagename').innerHTML = data.name;

            //post
            for(i=0;i<lenght;i++){
                var messages = data["posts"].data[i].message;
                if(messages == undefined){
                    var messages = "";
                }

                if(messages.length > 30 ){
                    messages = messages.substr(0,30)+'...';
                }
                
                
                posts.innerHTML +=  ` 
                <a href='Pos?s=${data["posts"].data[i].id}' class="col-md-3 mb-5 text-decoration-none card-hover">
                    <div class="card bg-tran border-none">
                    <img loading=lazy class="img-responsive" src="${data["posts"].data[i].full_picture}" alt="Image">
                    <p class="mt-2"> ${messages} </p>
                    <div class="media-body"><p class="m-0 d-inline">${data.name}</p> 
                            <small class="float-end"><span><i class="fas fa-globe-europe"></i> ${timeAgo(data["posts"].data[i].created_time)}</span></small>
                        </div> 
                    </div>
              
                </a>
          `;
        
            }
    })
}
