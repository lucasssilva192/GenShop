package com.teyvat.genshop.api

import com.google.gson.JsonObject
import com.teyvat.genshop.models.Cliente
import com.teyvat.genshop.models.Usuario
import retrofit2.Call
import retrofit2.http.*

interface ClienteAPI {

    @POST("/api/customer")
    fun cadastrar(@Header("Authorization") token: String, @Body request: Cliente): Call<Cliente>

    @GET("/api/customer")
    fun listar(@Header("Authorization") token: String): Call<Cliente>

    @PUT("/api/customer/{id}")
    fun atualizar(@Path("id") id: Int, @Header("Authorization") token: String, @Body request: Cliente): Call<Cliente>

}