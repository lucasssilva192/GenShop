package com.teyvat.genshop.utils

import android.app.Activity
import android.content.Context
import android.content.Intent
import android.util.Log
import android.view.View
import androidx.appcompat.app.AppCompatDelegate
import androidx.preference.PreferenceManager
import com.google.android.material.snackbar.Snackbar
import com.google.gson.JsonObject
import com.teyvat.genshop.CadastroClienteActivity
import com.teyvat.genshop.R
import com.teyvat.genshop.api.API
import com.teyvat.genshop.models.Produto
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import android.R.string.no


object Utilitarios {

    fun abrirTela(activity: Activity, classe: Class<out Any>){
        var intent = Intent(activity, classe)
        activity.startActivity(intent)
    }

    fun addAoCarrinho(view: View ,idProduto: Int, quantidade: Int) {
        val callback = object: Callback<Any> {
            override fun onResponse(call: Call<Any>, response: Response<Any>) {
                val resp = response.body()
                if(response.isSuccessful){
                    Snackbar.make(view, "Produto adicionado com sucesso!", Snackbar.LENGTH_LONG).show()
                } else {
                    Snackbar.make(view, "${response.code()}", Snackbar.LENGTH_LONG).show()
                }
            }
            override fun onFailure(call: Call<Any>, t: Throwable) {
                Snackbar.make(view, "Erro", Snackbar.LENGTH_LONG).show()
            }
        }
        var requisao = JsonObject()
        requisao.addProperty("product_id", idProduto)
        requisao.addProperty("quantity", quantidade)
        API().carrinho.adicionar_carrinho("Bearer ${Sessao.usuario?.token}", requisao).enqueue(callback)
    }

    fun remover_do_carrinho(view: View , idProduto: Int, quantidade: Int?) {
        val callback = object: Callback<Produto> {
            override fun onResponse(call: Call<Produto>, response: Response<Produto>) {
                val resp = response.body()
                Log.e("Response", "${response.body()}")
                if(response.isSuccessful){
                    Snackbar.make(view, "Produto removido com sucesso!", Snackbar.LENGTH_LONG).show()
                    Log.e("DEU CERTO", "${response.errorBody()}")
                } else {
                    Snackbar.make(view, "${response.code()}", Snackbar.LENGTH_LONG).show()
                    Log.e("ERRO", "${response.errorBody()}")
                }
            }
            override fun onFailure(call: Call<Produto>, t: Throwable) {
                Snackbar.make(view, "Erro ao remover produto", Snackbar.LENGTH_LONG).show()
                Log.e("ERRO-TIRAR-DO-CARRINHO", "${t}")
            }
        }
        var requisicao = JsonObject()
        requisicao.addProperty("product_id", idProduto)
        requisicao.addProperty("quantity", quantidade)
        API().carrinho.remover_do_carrinho("Bearer ${Sessao.usuario?.token}", requisicao).enqueue(callback)
    }

    fun snackBar(view: View, mensagem: String, duracao: Int){
        Snackbar.make(view, mensagem, duracao)
            //.setAction(R.string.action_text) {
                // Responds to click on the action
           // }
            .show()
    }

    fun aplicarTemaEscuro(context: Context, delegate: AppCompatDelegate){
        val temaEscuro = PreferenceManager.getDefaultSharedPreferences(context).getBoolean("tema_escuro", true)
        if(temaEscuro){
            AppCompatDelegate.setDefaultNightMode(AppCompatDelegate.MODE_NIGHT_YES)
            delegate.applyDayNight()
        }
        else {
            AppCompatDelegate.setDefaultNightMode(AppCompatDelegate.MODE_NIGHT_NO)
            delegate.applyDayNight()
        }
    }

    fun aplicarTema(context: Context, delegate: AppCompatDelegate){
        aplicarTemaEscuro(context, delegate)

        val corTema = PreferenceManager.getDefaultSharedPreferences(context).getString("tema_selecionado", "Default")
        when(corTema){
            "Pyro" -> {
                context.setTheme(R.style.Theme_GenShop_Pyro)
            }
            "Hydro" -> {
                context.setTheme(R.style.Theme_GenShop_Hydro)
            }
            "Electro" -> {
                context.setTheme(R.style.Theme_GenShop_Electro)
            }
            "Cryo" -> {
                context.setTheme(R.style.Theme_GenShop_Cryo)
            }
            "Anemo" -> {
                context.setTheme(R.style.Theme_GenShop_Anemo)
            }
            "Geo" -> {
                context.setTheme(R.style.Theme_GenShop_Geo)
            }
            "Dendro" -> {
                context.setTheme(R.style.Theme_GenShop_Dendro)
            }
        }
    }
}