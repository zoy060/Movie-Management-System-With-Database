let btn = document.querySelector(".zoy");

btn.addEventListener("click", function () {
    let table = document.querySelector("table");
    let row = table.insertRow();

    let cell1 = row.insertCell(0);
    let cell2 = row.insertCell(1);
    let cell3 = row.insertCell(2);
    let cell4 = row.insertCell(3);
    cell1.innerHTML = ' ';
    cell2.innerHTML = '<input name="user" type="text" >';
    cell3.innerHTML = '<input name="rating" type="text" >';
    cell4.innerHTML = '<textarea name="comment" id="" cols="40" rows="2"></textarea>';


});