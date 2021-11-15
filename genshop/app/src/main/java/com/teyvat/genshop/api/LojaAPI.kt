package com.teyvat.genshop.api

import com.teyvat.genshop.models.Loja
import retrofit2.Call
import retrofit2.http.GET

interface LojaAPI {
    @GET("api/store")
    fun listar(): Call<List<Loja>>
}