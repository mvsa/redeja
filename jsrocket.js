const minhaPromisse = () => new Promise((resolve,reject)=>{
    setTimeout(()=>{resolve('ok')},2000)
})

mihaOPromise().then(response=>{
    console.log(response)
})
.catch(err=>{

})

//jeito antigo /\


async function executaPromise(){
    const response = await minhaPromisse();
    console.log(response)
}

executaPromise();
 

//com arrrow function
const executaPromise = async()=>{
    console.log(await minhaPromisse());
}

----------------------------------------------------------------------------------------------------------


no html =

<head>
    <style>
        ul{
            list-style:none;
            margin: 0;
            padding: 0;
            font-family:sans-serif
        }

        li{
            clear:both;
            margin-top: 20px
        }

        img{
            width:80px
            float:left
            margin-right:10px
        }

        strong{
            font-size:20px
        }

        p{
            margin:5px 0;
        }

    </style>

</head>


<body>
    <form id = "repo-form">
        <input type="text" name="repository"/>
        <button type="submit">Adicionar</button>
    </form>

    <ul id="repo-list">
        
    </ul>
</body>


No JS:
//import api form './api';   preciso colocar o caminho ./ pois se colocar so o nome ele vai buscar no node_modules



class App{
    constructor(){
        this.repositories = [];

        this.FormEl = document.getElementById('repo-form');
        this.inputEl = document.querySelector('input[name=repository]');
        this.listEl = document.getElementById('repo-list');
        this.registerHandlers();
    }

    registerHandlers(){
        //vai registrar os eventos
        this.FormEl.onsubmit = (event) => this.addRepository(event); //se so tiver uma linha posso usar sem chaves
        
    }


    setLoading(loading = true){   //ele recebe um valor de loading, mas por padrão ele é true
        if(loading){
            let loadingEl = document.createElement('span');
            loadingEl.appendChild(document.createTextNode('Carregando'));
            loadingEl.setAttribute('id', 'loading');
            this.FormEl.appendChild(loadingEl);
        }else{
            document.getElementById('loading').remove();
        }
    }

    async addRepository(event){
        event.preventDefault();

        const repoInput = this.inputEl.value;
        if(repoInput.length === 0)
        return;  //se chegar aqui a funcao para de executar (volta)
        this.setLoading();
        try{
        
            const reponse = await api.get(`/repos/${repoInput}`);

            const {name, description, html_url, owner:{avatar_url}} = reponse.data;//a esquerda o que eu preciso(nomes exatos) e a direita a fonte deles

            this.repositories.push({
                name,   //name:name
                description,
                avatar_url,
                html_url,
            });
            this.inputEl.value = ''; //apaga o valor do input apos a pesquisar (usar isso)

            this.render();  

        } catch(err){
            alert('Repo não existe');
        }
        this.setLoading(false);   
    }

    render(){
        this.listEl.innerHTML = '';

        this.repositories.forEach(repo=>{
            let imgEl = document.createElement('img');
            imgEl.setAttribute('src',repo.avatar_url);

            let titleEl = document.createElement('strong')
            titleEl.appendChild(document.createTextNode(repo.name));

            let descriptionEl = document.createElement('p');
            descriptionEl.appendChild(document.createTextNode(repo.description));

            let linkEl = document.createElement(a);
            linkEl.setAttribute('target', '_blank');
            linkEl.setAttribute('href', repo.html_url)
            linkEl.appendChild(document.createTextNode('acessar'));

            let listItemEl = document.createElement('li')
            listItemEl.appendChild(imgEl);
            listItemEl.appendChild(titleEl);
            listItemEl.appendChild(descriptionEl);
            listItemEl.appendChild(linkEl);

            this.listEl.appendChild(listItemEl);
        })

    }

}

new App();




_____
cria um novo arquivo api.js para configurar o axios

import axios from 'axios';

const api = axios.create({
    baseUrl:'https://api.github.com'
});

export default api