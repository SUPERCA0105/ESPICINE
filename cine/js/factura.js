function calcularFactura() {
    const Usuario = document.getElementById("Usuario").value;
    const tituloPelicula = document.getElementById("tituloPelicula").value;
    const cantidadBoletos = parseInt(document.getElementById("cantidadBoletos").value);
    const precioUnitario = 10.50;
  
    const subtotal = cantidadBoletos * precioUnitario;
    const impuestos = subtotal * 0.16; // Suponiendo un impuesto del 16%
    const total = subtotal + impuestos;
  
    const facturaContainer = document.getElementById("facturaContainer");
  
    
    const facturaHTML = `
      <h2>Factura de compra</h2>
      <p>Usuario: ${Usuario}</p>
      <p>Película: ${tituloPelicula}</p>
      <p>Cantidad de boletos: ${cantidadBoletos}</p>
      <p>Precio unitario: $${precioUnitario}</p>
      <hr>
      <p>Subtotal: $${subtotal}</p>
      <p>Impuestos (16%): $${impuestos}</p>
      <p>Total: $${total}</p>
    `;
  
    facturaContainer.innerHTML = facturaHTML;
  }