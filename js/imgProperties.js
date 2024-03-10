class ImgProperties extends HTMLElement {
    constructor(){
        super();

        this.innerHTML = `
            <div class="img-properties">
                <div class="img-property img-delete" btn-name='delete' contenteditable='false'>
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>
        `
    }

    connectedCallback(){
        this.querySelector('.img-delete').addEventListener('click', (e)=>{
            const writingArea = document.getElementById('text-input');
            const imgWrapper = this.closest("li")? this.closest("li"):
                this.closest('div.line')
            if(imgWrapper){
                imgWrapper.remove()
                if(writingArea.getElementsByTagName('div').length < 1){
                    var newDiv = document.createElement('div')
                    newDiv.classList.add('line');
                    newDiv.contentEditable = true;
                    newDiv.setAttribute('data-placeholder', 'Enter text here')
                    writingArea.appendChild(newDiv)
                }
            }
        })
    }
}
customElements.define('img-properties', ImgProperties);