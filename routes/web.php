<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/buscador', 'ProductoController@buscarProductos')->name('buscadorProductos');

Route::get('/productos', 'ProductoController@listadoProducto');
Route::get('/producto/{id}', 'ProductoController@detalle')->name('detalleProducto');
Route::get('/productos/categoria/{id}', 'ProductoController@listadoPorCategoria');

Route::get('/productos/agregar', 'ProductoController@agregarForm')->name('agregarProducto');
Route::post('/productos/agregar', 'ProductoController@agregar');

Route::get('/marcas', 'MarcaController@listadoMarcas');

Route::get('/marcas/agregar', 'MarcaController@agregarForm')->name('agregarMarca');
Route::post('/marcas/agregar', 'MarcaController@agregar');

// Route::get('/pedidos/nuevo', 'PedidoController@showPedidoForm');
// Route::post('/pedidos/nuevo', 'PedidoController@agregar');

Route::get('/carrito-test', 'CarritoController@carritoTest')->middleware('auth');
Route::post('/carrito/agregar/', 'CarritoController@agregar')->middleware('auth');
Route::post('/carrito/actualizar/', 'CarritoController@agregar')->middleware('auth');
Route::post('/carrito/eliminar/', 'CarritoController@eliminar')->middleware('auth')->name('carritoEliminar');

Route::get('/checkout/datos-pago', 'PagoController@mostrarFormPago')->middleware('auth')->name('datosPago')->middleware('pedido');
Route::post('/checkout/datos-pago', 'PagoController@procesarPago')->middleware('auth')->middleware('pedido');


Route::get('/checkout/datos-envio', 'EnvioController@mostrarElegirDireccion')->name('datosEnvio')->middleware('auth')->middleware('pedido');
Route::post('/checkout/datos-envio', 'EnvioController@guardarElegirDireccion')->middleware('auth')->middleware('pedido');
Route::post('/direcciones/agregarDesdeEnvio', 'DireccionController@agregarDesdeEnvio')->middleware('auth')->name('agregarDireccionDesdeEnvio');

Route::get('/carrito', 'CarritoController@carrito')->name('carrito')->middleware('auth');
Route::post('/carrito', 'CarritoController@actualizarCarrito')->middleware('auth');
Route::get('/checkout', 'PedidoController@iniciarPedido')->middleware('auth')->name('checkout');

Route::get('/checkout/final', 'PedidoController@finalizarPedido')->middleware('auth')->name('finalizarPedido');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('registro', 'Auth\RegisterController@showRegistrationForm')->name('registro');
Route::post('registro', 'Auth\RegisterController@register');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('/', 'HomeController@index')->name('home');

Route::get('home', function(){
    return view('home');
});

Route::get('/api/categorias', 'CategoriaController@listadoAPI')->middleware('api');
Route::get('/api/marcas', 'MarcaController@listadoAPI')->middleware('api');
