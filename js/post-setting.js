
// let blogSavingForm = document.getElementById('blog-saving-form');
// let postContent = document.getElementById('post-content');
// let inputPostImage = document.getElementById('input-post-image');
// let postThumbnailImage = document.getElementById('post-thumbnail-image');



// upload image
// let imageUrl = null;
// async function createNewImage(content, extension){
//     uploadImage(content, extension)
//     .then(response => response.json())
//     .then(data => {
//         // console.log(data);
//         const content = data.content;
//         imageUrl = content.download_url;
//         postThumbnailImage.setAttribute('src', imageUrl);
//     })
//     .catch((error) => console.error('Error:', error));
// }
// upload file
// inputPostImage.addEventListener('change', (event)=>{
//     if(event.target.files && event.target.files[0]){   
//         const file = event.target.files[0];
//         var reader = new FileReader();

//         reader.onloadend = function() {
//             var content = reader.result;

//             const fileName = file.name;
//             const extension = fileName.split('.').pop();

//             createNewImage(content, extension);
//         }

//         reader.readAsDataURL(file);
//     }
// })
// submit form
// blogSavingForm.addEventListener('submit', (event)=>{
//     event.preventDefault();

//     var form = document.createElement('form');
//     form.method = blogSavingForm.method;
//     form.action = blogSavingForm.action;

//     var content = postContent.innerHTML;
//     // blog content
//     var inputContent = document.createElement('input');
//     inputContent.name = 'postContent';
//     inputContent.value = content;
//     form.appendChild(inputContent);
    
//     // post image url
//     var inputImg = document.createElement('input');
//     inputImg.name = 'postImg';
//     inputImg.value = imageUrl;
//     form.appendChild(inputImg);

//     // post title
//     const postTitle = blogSavingForm.querySelector('.post-title p').innerHTML;
//     var inputTitle = document.createElement('input');
//     inputTitle.name = 'postTitle';
//     inputTitle.value = postTitle;
//     form.appendChild(inputTitle);
//     // state
//     const state = blogSavingForm.querySelector('#state-selector').value;
//     var inputState = document.createElement('input');
//     inputState.name = 'state';
//     inputState.value = state;
//     form.appendChild(inputState);

//     // categories
//     const categories = [];
//     const categoryInputs = blogSavingForm.querySelectorAll('.form-check-input:checked');
//     categoryInputs.forEach((category) => {
//         categories.push(category.value);
//     });
//     var inputCategory = document.createElement('input');
//     inputCategory.name = 'categories';
//     inputCategory.value = categories;
//     form.appendChild(inputCategory);


//     // submit
//     document.body.appendChild(form);
//     form.submit();
// })