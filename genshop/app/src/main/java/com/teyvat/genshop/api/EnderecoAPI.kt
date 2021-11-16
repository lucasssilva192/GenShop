package com.teyvat.genshop.api

import com.google.gson.JsonObject
import com.teyvat.genshop.models.Cliente
import com.teyvat.genshop.models.Endereco
import retrofit2.Call
import retrofit2.http.Body
import retrofit2.http.Header
import retrofit2.http.POST

interface EnderecoAPI {

    @POST("/api/address")
    fun cadastrar(@Header("Authorization") token: String, @Body request: Endereco): Call<Endereco>

}