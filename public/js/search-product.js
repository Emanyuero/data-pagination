$(document).ready(function(){
    searchProduct();
    loadPaginatedProducts();
})

function displayError(message){
    $("#display-error").html(`<span class="alert alert-danger" style="margin-top: -40px;">${message}</span>`);
}

function searchProduct(){
    $("#search-button").on('click', async function(){
        const query = $("#search-product").val().trim();

        $("#display-error").html('');

        if(!query){
            displayError("Price Not Found.");
        }else{
            try {
                const response = await fetch(`/api/search-product?search-product=${query}`);
                const products = await response.json();

                if(products.length === 0){
                    displayError("Please enter the Valid Price Tag.")
                    displayNotFound();
                }else{
                    loadProducts(products);
                }
            } catch (error) {

            }
        }
    })
}

function displayNotFound(){
    var row = `
        <tr>
            <td colspan="5">Products not found</td>
        </tr>
    `;

    $("tbody").html(row);
}

async function loadPaginatedProducts(page = 1){
    try {
        const response = await fetch(`/?=${page}`);
        const products = await response.json();

        loadProducts(products);

    } catch (error) {
        console.error("Error paginating products", error);
    }
}


function loadProducts(products){
    var rows = '';

    $.each(products, function(index, product){
        rows += `
        <tr>
            <th scope="col">${product.id}</th>
            <td>${product.product_name}</td>
            <td>${product.description}</td>
            <td>${product.price}</td>
            <td>${product.quantity}</td>
        </tr>
        `;
    })

    $('tbody').html(rows);
}
