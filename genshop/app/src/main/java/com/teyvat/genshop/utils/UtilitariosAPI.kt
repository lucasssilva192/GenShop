package com.teyvat.genshop.utils

import android.content.Context
import android.util.Log
import android.view.View
import com.google.android.material.snackbar.Snackbar
import com.teyvat.genshop.api.API
import com.teyvat.genshop.models.Endereco
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

object UtilitariosAPI {

    fun escolherEndereco(view: View, endereco: Endereco) {
        val callback = object: Callback<Endereco> {
            override fun onResponse(call: Call<Endereco>, response: Response<Endereco>) {
                if(response.isSuccessful){
                    Utilitarios.snackBar(view, "Endereço selecionado", Snackbar.LENGTH_SHORT)
                }
                else {
                    Utilitarios.snackBar(view, "Erro: ${response.errorBody().toString()}", Snackbar.LENGTH_SHORT)
                }
            }
            override fun onFailure(call: Call<Endereco>, t: Throwable) {
                Utilitarios.snackBarRequestFaliure(view)
            }
        }

        API().endereco.mudarMain(endereco.id!!,"Bearer ${Sessao.usuario?.token}").enqueue(callback)
    }

    fun removeEndereco(view: View, endereco: Endereco) {
        val callback = object: Callback<Endereco> {
            override fun onResponse(call: Call<Endereco>, response: Response<Endereco>) {
                if(response.isSuccessful){
                    Utilitarios.snackBar(view, "Endereço removido com sucesso", Snackbar.LENGTH_LONG)
                }
                else {
                    Utilitarios.snackBar(view, "Erro: ${response.errorBody().toString()}", Snackbar.LENGTH_SHORT)
                }
            }
            override fun onFailure(call: Call<Endereco>, t: Throwable) {
                Utilitarios.snackBarRequestFaliure(view)
            }
        }

        API().endereco.remover(endereco.id!!,"Bearer ${Sessao.usuario?.token}").enqueue(callback)
    }


}