package com.teyvat.genshop.api

import com.google.gson.JsonObject
import com.teyvat.genshop.models.Usuario
import com.teyvat.genshop.utils.Sessao
import retrofit2.Call
import retrofit2.http.*

interface UsuarioAPI {

    @Headers(value = ["Accept: application/json",
        "Content-type:application/json"])
    @POST("/api/login")
    fun logar(@Body request: JsonObject): Call<Usuario>

    @POST("/api/register")
    fun cadastrar(@Body request: JsonObject): Call<Usuario>

    @GET("/api/logintoken")
    fun logarToken(@Header("Authorization") token: String): Call<Usuario>
}