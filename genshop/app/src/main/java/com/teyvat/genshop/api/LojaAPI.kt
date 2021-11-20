package com.teyvat.genshop.api

import com.google.gson.JsonObject
import com.teyvat.genshop.models.Loja
import com.teyvat.genshop.models.Produto
import retrofit2.Call
import retrofit2.http.Body
import retrofit2.http.GET
import retrofit2.http.POST
import retrofit2.http.Path

interface LojaAPI {
    @GET("api/store")
    fun listar(): Call<List<Loja>>

    @GET("/api/store/products/{id}")
    fun lista_produto_loja(@Path("id") id: Int): Call<List<Produto>>

    @POST("/api/store/search")
    fun pesquisar(@Body request: JsonObject): Call<List<Loja>>

    @POST("/api/store/search_category")
    fun pesquisa_categoria(@Body request: JsonObject): Call<List<Loja>>
}