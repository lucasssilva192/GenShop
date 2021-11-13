package com.teyvat.genshop.api

import android.content.Context
import okhttp3.OkHttpClient
import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory
import java.util.concurrent.TimeUnit

class API(context: Context) { //val context: Context
    private val baseUrl = "http://192.168.0.19:80"
    private val timeout = 30L

    private val retrofit: Retrofit
        get() {

            val okHttp = OkHttpClient.Builder()
                .readTimeout(timeout, TimeUnit.SECONDS)
                .connectTimeout(timeout, TimeUnit.SECONDS)
                .build()

            //Obter instancia do retrofit
            return Retrofit.Builder()
                .baseUrl(baseUrl)
                .client(okHttp)
                .addConverterFactory(GsonConverterFactory.create())
                .build()
        }

    val usuario: UsuarioAPI
        get() {
            return retrofit.create(UsuarioAPI::class.java)
        }
}