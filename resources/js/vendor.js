import "../css/index.css";
import "../css/mapas.css";
import "../css/bootstrap/bootstrap.min.css";
import "../css/sweetalert/sweetalert.css";
import 'bootstrap';
import "../lib/sweetalert.js";



window.obtenerContratos=async function(page=null)  {
     
    let limitador=document.getElementById("slct_limitador_contrato").value;
    let parametros={
      numero_pagina:page,
      limitador:limitador
    };
    const settings = {
      method: 'POST',
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
      },
      body:JSON.stringify(parametros)
    };
    try {
      const fetchResponse = await fetch(`../contrato/getAll`, settings);
      const data = await fetchResponse.json();
      // Creamos la tabla
      crearTable(data.contratos);
      // Creamos el paginado
      createPaging(data.pagination);
    } catch (e) {
      console.log(e);
    }  

}

function crearTable(data){
  let html="";
  data.forEach(element => {
    html += `
    <tr>
      <th >${element.id}</th>
      <td>${element.id_personal}</td>
      <td>${element.importe}</td>
    </tr>`;
  });
  document.getElementById("cuerpo").innerHTML=html;
}

function createPaging(data) {
    let offset=3;
    var from = (data.current_page) - offset;
    if (from < 1) {
      from = 1;
    }

    var to = from + offset * 2;
    if (to >= data.last_page) {
      to = data.last_page;
    }

    var pagesArray = [];
    while (from <= to) {
      pagesArray.push(from);
      from++;
    }
  

  let html = `<div class="pagination-left">Mostrando Contratos del ${data.from} al ${data.to} de un total de ${data.total_records} registros</div><div class="pagination"><ul class="pagination">`,
    total_pages = Math.ceil(data.total_records / data.per_page);

  if (data.current_page > 1) {
    html += `
          <li class="page-item ">
          <a class="page-link" href="#" tabindex="-1" aria-disabled="true" onclick="obtenerContratos(${data.current_page - 1})">Anterior</a>
          </li>
          `;
  }

  for (let i = 0; i <= pagesArray.length - 1; i++) {
    if (data.current_page == pagesArray[i]) {
      html += `<li><a class="page-link active-currentpage" onclick="obtenerContratos(${pagesArray[i]})">${pagesArray[i]}</a></li>`;
    } else {
      html += `<li><a class="page-link" data-page="${pagesArray[i]}" onclick="obtenerContratos(${pagesArray[i]})">${pagesArray[i]}</a></li>`;
    }
  }


  if (data.current_page < total_pages) {
    html += `
    <li class="page-item">
       <a class="page-link" data-page="${data.current_page + 1}" onclick="obtenerContratos(${data.current_page + 1})" href="#">Siguiente</a>
    </li>
    `;
  }

  html += '</ul></div>';

  document.getElementById("tfootpaging").innerHTML=html;
}


     
obtenerContratos(1);