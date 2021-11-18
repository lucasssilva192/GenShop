package com.teyvat.genshop.api

import com.google.gson.JsonObject
import com.teyvat.genshop.models.Produto
import retrofit2.Call
import retrofit2.http.*

interface ProdutoAPI {
    @GET("/api/product")
    fun listar(): Call<List<Produto>>

    @POST("/api/product/search")
    fun pesquisar(@Body request: JsonObject): Call<List<Produto>>
}