$(document).ready(function(){
    var currentPage = 0;
    var amount = 10;
    loadProducts(0,amount);
    
    $("#next").click(function(){
        currentPage += 1;
        $("#currentPage").text(currentPage);
        loadProducts(currentPage*amount,amount);
    })
    
    $("#back").click(function(){
        if(currentPage != 0){
            currentPage -= 1;
            $("#currentPage").text(currentPage);
            loadProducts(currentPage*amount,amount);
        }
    })
});

function loadProducts(offset, amount){
        $.ajax({url: "data/dbJSON.php",
            method:"POST",
            data:{
                offset: offset,
                amount: amount
            },
            success: parseProducts,
            error: function(err){
                console.log(err.responseText);
            },
            dataType: 'JSON'            
           });
}
    
function parseProducts(data){
    var html = '';
    html += "<tbody>";
    data.forEach(function(item){
        html += "<tr>";
        html+= "<td>" + item.name + "</td>";
        html += "<td>" + item.price + "</td>";
        html += "</tr>";
    });
    html += "</tbody>";
    
    $("#table").html(html);
}