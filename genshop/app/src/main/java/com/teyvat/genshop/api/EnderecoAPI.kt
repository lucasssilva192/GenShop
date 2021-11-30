package com.teyvat.genshop.api

import com.google.gson.JsonObject
import com.teyvat.genshop.models.Cliente
import com.teyvat.genshop.models.Endereco
import retrofit2.Call
import retrofit2.http.*

interface EnderecoAPI {

    @POST("/api/address")
    fun cadastrar(@Header("Authorization") token: String, @Body request: Endereco): Call<Endereco>

    @PUT("/api/address/main/{address}")
    fun mudarMain(@Path("address") id: Int, @Header("Authorization") token: String): Call<Endereco>

    @DELETE("/api/address/{address}")
    fun remover(@Path("address") id: Int, @Header("Authorization") token: String): Call<Endereco>

    @PUT("/api/address/{address}")
    fun atualizar(@Path("address") id: Int, @Header("Authorization") token: String, @Body request: Endereco): Call<Endereco>

    @GET("/api/address")
    fun listar(@Header("Authorization") token: String): Call<List<Endereco>>
}