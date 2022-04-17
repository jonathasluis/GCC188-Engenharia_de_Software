function adicionarProduto(){
    let produto = document.getElementById("produto");
    let novoProduto = produto.cloneNode(true);
    novoProduto.id = "";
    document.getElementById("produtos").appendChild(novoProduto);
}

function removerProduto(botao){
    botao.parentNode.parentNode.remove();
}