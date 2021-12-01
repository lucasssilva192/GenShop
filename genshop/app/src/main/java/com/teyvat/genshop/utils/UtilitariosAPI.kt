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
/*
    fun listarEnderecos(listaEnderecos: List<Endereco>) {
        val callback = object: Callback<List<Endereco>> {
            override fun onResponse(call: Call<List<Endereco>>, response: Response<List<Endereco>>) {
                if(response.isSuccessful){
                    val enderecos = response.body()
                    enderecos?.let {
                        listaEnderecos.clear()
                        listaEnderecos.addAll(it)
                        adapter.notifyDataSetChanged()
                    }
                } else {
                    val error = response.errorBody().toString()
                    Utilitarios.snackBar(binding.root, error, Snackbar.LENGTH_LONG)
                    Log.e("ERROR", response.errorBody().toString())
                }
            }
            override fun onFailure(call: Call<List<Endereco>>, t: Throwable) {
                Utilitarios.snackBar(binding.root, "Não foi possível listar os endereços", Snackbar.LENGTH_LONG)
            }
        }

        API().endereco.listar("Bearer ${Sessao.usuario?.token}").enqueue(callback)
    }

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

        API().endereco.remover(1,"Bearer ${Sessao.usuario?.token}").enqueue(callback)
    }

*/
}