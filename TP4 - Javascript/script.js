


let form = document.getElementsByTagName('form')[0];

form.addEventListener('submit', function(event) {
  event.preventDefault();


  //Get submitted product
  let product = event.target[0].value;
  let quantity = event.target[1].value;


  let tr = document.createElement("tr");

  tr.innerHTML = `<tr>
  					<td>${product}</td>
  					<td><input type="number" value=${quantity}></td>
  					<td><input type="button" value="Remove"></td>
  				</tr>`;

  document.querySelector("#products tbody").append(tr);

  tr.querySelector("td:nth-child(3) input").onClick() = function(event) { 
  	event.preventDefault();
  	tr.remove();
  }
  alert('Submitted!');

});


