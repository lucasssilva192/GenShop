package com.teyvat.genshop

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.view.View
import com.google.android.material.snackbar.Snackbar
import com.google.gson.JsonObject
import com.squareup.picasso.Picasso
import com.teyvat.genshop.api.API
import com.teyvat.genshop.api.ProdutoAPI
import com.teyvat.genshop.databinding.ActivityListaProdutoBinding
import com.teyvat.genshop.databinding.ItemProdutoBinding
import com.teyvat.genshop.menu.MenuActivity
import com.teyvat.genshop.models.Produto
import com.teyvat.genshop.models.Usuario
import com.teyvat.genshop.utils.Sessao
import com.teyvat.genshop.utils.Utilitarios
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory

class ListaProdutoActivity : AppCompatActivity() {
    lateinit var binding: ActivityListaProdutoBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityListaProdutoBinding.inflate(layoutInflater)
        setContentView(binding.root)
    }

    override fun onResume() {
        super.onResume()
        atualizarProdutos()
    }

    fun atualizarProdutos() {
        val retrofit = Retrofit.Builder()
            .baseUrl("http://192.168.3.26:80")
            .addConverterFactory(GsonConverterFactory.create())
            .build()

        val service = retrofit.create(ProdutoAPI::class.java)
        val call = service.listar()

        val callback = object : Callback<List<Produto>> {
            override fun onResponse(call: Call<List<Produto>>, response: Response<List<Produto>>) {
                binding.progressBar.visibility = View.GONE
                if (response.isSuccessful){
                    val listaProdutos = response.body()
                    atualizarUi(listaProdutos)
                } else {
                    //val error = response.errorBody().toString()
                    Snackbar.make(binding.container, "Erro", Snackbar.LENGTH_LONG).show()
                    Log.e("ERROR", response.errorBody().toString())
                }

            }
            override fun onFailure(call: Call<List<Produto>>, t: Throwable){
                binding.progressBar.visibility = View.GONE
                Snackbar.make(binding.container, "Erro ao carregar os produtos", Snackbar.LENGTH_LONG).show()
                Log.e("ERROR", "${t.message}", t)
            }
        }
        API().produto.listar().enqueue(callback)
        binding.progressBar.visibility = View.VISIBLE
    }

    fun atualizarUi(lista: List<Produto>?) {
        binding.container.removeAllViews()

        lista?.forEach {
            val cardBinding = ItemProdutoBinding.inflate(layoutInflater)

            cardBinding.txtNomeProduto.text = it.name
            cardBinding.txtCategoriaProd.text = it.category_id.toString()
            cardBinding.txtPreco.text = it.price

            //Picasso.get().load("D:\\SENAC\\PI-4\\GenShop\\genshop-admin\\public\\img\\products\\1dcd4d679420889cf1c5476f66c579fa.png").into(cardBinding.imgProduto)

            binding.container.addView(cardBinding.root)
        }
    }
}