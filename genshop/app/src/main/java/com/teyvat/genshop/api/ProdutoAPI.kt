package com.teyvat.genshop.api

import com.teyvat.genshop.models.Produto
import retrofit2.Call
import retrofit2.http.GET

interface ProdutoAPI {
    @GET("/api/product")
    fun listar(): Call<List<Produto>>
}