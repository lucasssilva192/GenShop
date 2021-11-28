package com.teyvat.genshop.api

import com.google.gson.JsonObject
import com.teyvat.genshop.models.Compra
import com.teyvat.genshop.models.Endereco
import com.teyvat.genshop.models.ProdCompra
import com.teyvat.genshop.models.Produto
import retrofit2.Call
import retrofit2.http.*

interface CarrinhoAPI {
    @POST("/api/cart/add")
    fun adicionar_carrinho(@Header("Authorization") token: String, @Body request: JsonObject): Call<Any>

    @PUT("/api/cart/remove")
    fun remover_do_carrinho( @Header("Authorization") token: String, @Body request: JsonObject): Call<Produto>

    @GET("/api/cart/show")
    fun ver_carrinho(@Header("Authorization") token: String): Call<List<Produto>>

    @POST("api/order/")
    fun finalizar_compra(@Header("Authorization") token: String):  Call<Compra>

    @PUT("api/order/products")
    fun carrega_carrinho(@Header("Authorization") token: String, @Body request: JsonObject): Call<List<ProdCompra>>

    @POST("api/order/finish_order")
    fun fecha_compra(@Header("Authorization") token: String, @Body request: JsonObject): Call<Any>

    @GET("api/order")
    fun minhas_compras(@Header("Authorization") token: String): Call<List<Compra>>

    @PUT("api/order/products")
    fun prod_compra(@Header("Authorization") token: String, @Body request: JsonObject): Call<List<ProdCompra>>
}