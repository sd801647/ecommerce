var dynamic = document.querySelector('.container');
let producturl = "./json/product.json";
let requestproduct = new XMLHttpRequest();
requestproduct.open('GET', producturl);
requestproduct.responseType = 'text';
requestproduct.send();
requestproduct.onload = () => {
    const a = requestproduct.response;
    const product = JSON.parse(a);
    for (var i = 0; i < product.length; i++) {
        var fetch = document.querySelector('.container').innerHTML;
        dynamic.innerHTML = `<div id="cards${i}" class="boxes">
                    <div class="box-content">
                    <h3>${product[i]['pname']}</h3>
                    <p>
                    <span class="text-muted text-decoration-line-through"><b>&#8377;${product[i]['actprice']}</b></span>
                    <b>&#8377;${product[i]['disprice']}</b>
                    </p>
                    <p><span style="font-size:80%;color:red">&#8377;${parseInt(product[i]['actprice'])-parseInt(product[i]['disprice'])} OFF</span>
                    <button class="button-show-more" role="button">Show More</button></p>
                    </div>
                    </div>` + fetch;
        var bgimg = document.getElementById(`cards${i}`);
        bgimg.style.backgroundImage = `url('${product[i]['imagepath']}')`;
    }
}