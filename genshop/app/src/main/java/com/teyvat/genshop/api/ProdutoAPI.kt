package com.teyvat.genshop.api

import com.teyvat.genshop.models.Produto
import retrofit2.Call
import retrofit2.http.GET
import retrofit2.http.Path

interface ProdutoAPI {
    @GET("/api/product")
    fun listar(): Call<List<Produto>>

    @GET("/api/product/{nome}")
    fun visualizar(@Path("nome") nome: String): Call<Produto>
}