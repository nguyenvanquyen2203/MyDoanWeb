class CategoryCheckBox extends HTMLElement{
    constructor(){
        super();
        let categories = JSON.parse(this.getAttribute('categories'));
        
        let html = `
            <div class="d-flex">
                <div class="input-group-prepend">
                    <span class="input-group-text btn-secondary" id="inputGroup-sizing-default">Categories</span>
                </div>
                <ul class='category-items d-flex w-auto'>
        `;

        for (let category of categories){
            html += `
                <li class='category-item mx-1 btn btn-light'>"${category}"</li>
            `;
        }

        html += `
                </ul>
                <div class="btn btn-info" id="category-addtag">
                    <i class="fa-solid fa-plus"></i>
                </div>  
            </div>
        `;

        this.innerHTML = html;
    }

    connectedCallback(){
        let categoryCheckInputs = document.querySelectorAll('.form-check-input');
        categoryCheckInputs.forEach((input) =>{
            input.addEventListener('change', ()=>{
                var categories = JSON.parse(this.getAttribute('categories'));
                const value = input.value;
                if(input.checked){
                    categories.push(value);
                    
                }else{
                    categories = categories.filter(category => category!=value);
                }
                this.setAttribute('categories', JSON.stringify(categories));
                // remove existing category items
                let categoryItems = this.querySelectorAll('.category-item');
                categoryItems.forEach((item) => {
                    item.remove();
                });

                // add new category items
                let categoryItemsContainer = this.querySelector('.category-items');
                categories.forEach((category)=>{
                    var newItem = document.createElement('li');
                    newItem.className = 'category-item mx-1 btn btn-light';
                    newItem.textContent = category;
                    categoryItemsContainer.appendChild(newItem);
                    
                });
            })
        })
        // add new category and show the checkboxes
        this.querySelector("#category-addtag").addEventListener('click', ()=>{
            const categoryCheckBox = document.getElementById('category-checkbox-dropdown');
            categoryCheckBox.classList.toggle('d-none');
            console.log(categoryCheckBox)
            console.log('vailoz')
        });



    }
}
customElements.define('category-checkbox', CategoryCheckBox);