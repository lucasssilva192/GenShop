package com.teyvat.genshop.utils

import android.content.Context
import android.util.Log
import android.view.View
import com.google.android.material.snackbar.Snackbar
import com.teyvat.genshop.api.API
import com.teyvat.genshop.models.Cliente
import com.teyvat.genshop.models.Endereco
import com.teyvat.genshop.models.Usuario
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

        API().endereco.remover(endereco.id!!,"Bearer ${Sessao.usuario?.token}").enqueue(callback)
    }

    fun logarComToken(view: View){
        //#region Endereço
        val callbackEndereco = object : Callback<Endereco> {
            override fun onResponse(call: Call<Endereco>, response: Response<Endereco>) {
                if(response.isSuccessful) {
                    Sessao.endereco = response.body()
                    Log.d("Cliente", Sessao.cliente!!.id.toString())
                    Log.d("Endereço", Sessao.endereco!!.id.toString())
                }
                else {
                    val error = response.errorBody().toString()
                    Utilitarios.snackBar(view, error, Snackbar.LENGTH_LONG)
                }
            }
            override fun onFailure(call: Call<Endereco>, t: Throwable) {
                Utilitarios.snackBar(view, "Falha ao conectar com o servidor. ${t.message}", Snackbar.LENGTH_LONG)
                Log.e("ERROR","${t.message}")
            }
        }
        //#endregion

        //#region Cliente
        val callbackCliente = object : Callback<Cliente> {
            override fun onResponse(call: Call<Cliente>, response: Response<Cliente>) {
                if(response.isSuccessful) {
                    Sessao.cliente = response.body()
                    Utilitarios.snackBar(view, "Bem-vindo ${Sessao.cliente!!.first_name}", Snackbar.LENGTH_LONG)
                    API().endereco.listarPrincipal("Bearer ${Sessao.usuario?.token}").enqueue(callbackEndereco)
                }
                else {
                    val error = response.errorBody().toString()
                    Utilitarios.snackBar(view, error, Snackbar.LENGTH_LONG)
                }
            }
            override fun onFailure(call: Call<Cliente>, t: Throwable) {
                Utilitarios.snackBar(view, "Falha ao conectar com o servidor. ${t.message}", Snackbar.LENGTH_LONG)
                Log.e("ERROR","${t.message}")
            }
        }

        //#endregion

        //#region Usuario
        val callbackUsuario = object : Callback<Usuario> {
            override fun onResponse(call: Call<Usuario>, response: Response<Usuario>) {
                if(response.isSuccessful) {
                    val usuario = response.body()
                    Sessao.usuario!!.name = usuario!!.name
                    Sessao.usuario!!.email = usuario!!.email
                    Log.d("Token", Sessao.usuario!!.token)
                    API().cliente.listar("Bearer ${Sessao.usuario?.token}").enqueue(callbackCliente)
                }
                else {
                    val error = response.errorBody().toString()
                    Utilitarios.snackBar(view, error, Snackbar.LENGTH_LONG)
                }
            }
            override fun onFailure(call: Call<Usuario>, t: Throwable) {
                Utilitarios.snackBar(view, "Falha ao conectar com o servidor. ${t.message}", Snackbar.LENGTH_LONG)
                Log.e("ERROR","${t.message}")
            }
        }
        API().usuario.logarToken("Bearer ${Sessao.usuario?.token}").enqueue(callbackUsuario)
        //#endregion
    }

*/
}