posts.innerHTML += `
            <div class="card  mt-4  border-0 shadow-lg bg-white">
                <div class="p-2"> 
                    <div class="media m-0"> 
                        <div class="d-flex mr-3">
                            <img class="img-fluid rounded-circle" src="${data.picture.data.url}" alt="User">
                        </div> 
                        <div class="media-body"><p class="m-0">${data.name}</p> 
                            <small><span><i class="fas fa-globe-europe"></i> ${timeAgo(data["posts"].data[i].created_time)}</span></small>
                        </div> 
                    </div> 
                </div> 
                <div class="card-body p-0">
                    <p class="p-2">${messages}</p>
                    <img class="img-responsive" src="${data["posts"].data[i].full_picture}" alt="Image">
                </div>
            </div> `;


          