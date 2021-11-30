package com.teyvat.genshop.api

import com.teyvat.genshop.models.ViaCEP
import okhttp3.OkHttpClient
import retrofit2.Call
import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory
import retrofit2.http.GET
import retrofit2.http.Header
import retrofit2.http.Path
import java.util.concurrent.TimeUnit

interface ViaCepAPI {
    @GET("/ws/{cep}/json/")
    fun buscarCep(@Path("cep") cep: String): Call<ViaCEP>
}

class ViaCepRetrofit {
    private val baseUrl = "https://viacep.com.br"
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

    val viacep: ViaCepAPI
        get() {
            return retrofit.create(ViaCepAPI::class.java)
        }
}