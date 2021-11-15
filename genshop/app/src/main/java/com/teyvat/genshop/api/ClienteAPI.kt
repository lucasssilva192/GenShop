package com.teyvat.genshop.api

import com.google.gson.JsonObject
import com.teyvat.genshop.models.Cliente
import com.teyvat.genshop.models.Usuario
import retrofit2.Call
import retrofit2.http.Body
import retrofit2.http.Header
import retrofit2.http.POST

interface ClienteAPI {

    @POST("/api/customer")
    fun cadastrar(@Header("Authorization") token: String, @Body request: Cliente): Call<Cliente>

}