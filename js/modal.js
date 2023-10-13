$('.edit-button').click(function() {
    var productId = $(this).data('product-id');
    let productNombre = $(this).data('product-nombre');
    let productDescripcion = $(this).data('product-descripcion');
    let productStock = $(this).data('product-stock');
    let productPrecio = $(this).data('product-precio');
    let productCondicion = $(this).data('product-condicion');
    let productMarca = $(this).data('product-marca');

    // Rellenar los campos del formulario dentro del modal con los datos del producto
    $('#mymodal #nombreProducto').val(productNombre);
    $('#mymodal #descripcion').val(productDescripcion);
    $('#mymodal #stock').val(productStock);
    $('#mymodal #precio').val(productPrecio);
    $('#mymodal #condicion').val(productCondicion);
    $('#mymodal #marca').val(productMarca);
});