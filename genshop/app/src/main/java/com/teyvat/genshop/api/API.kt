package com.teyvat.genshop.api

import android.content.Context
import okhttp3.OkHttpClient
import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory
import java.util.concurrent.TimeUnit

class API() { //val context: Context
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

    val cliente: ClienteAPI
        get() {
            return retrofit.create(ClienteAPI::class.java)
        }

    val endereco: EnderecoAPI
        get() {
            return retrofit.create(EnderecoAPI::class.java)
        }

    val produto : ProdutoAPI
        get() {
            return retrofit.create(ProdutoAPI::class.java)
        }

    val loja : LojaAPI
        get() {
            return retrofit.create(LojaAPI::class.java)
        }

    val carrinho: CarrinhoAPI
        get() {
            return retrofit.create(CarrinhoAPI::class.java)
        }
}