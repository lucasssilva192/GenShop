package com.teyvat.genshop

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.text.Editable
import android.util.Log
import com.google.android.material.snackbar.Snackbar
import com.google.gson.JsonObject
import com.squareup.picasso.Picasso
import com.teyvat.genshop.api.API
import com.teyvat.genshop.databinding.ActivityShowProdutoBinding
import com.teyvat.genshop.models.Produto
import com.teyvat.genshop.utils.Sessao
import com.teyvat.genshop.utils.Utilitarios
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class ShowProdutoActivity : AppCompatActivity() {
    lateinit var binding: ActivityShowProdutoBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        binding = ActivityShowProdutoBinding.inflate(layoutInflater)
        super.onCreate(savedInstanceState)
        Utilitarios.aplicarTema(this, delegate)
        setContentView(binding.root)

        val nomeProd = intent.getStringExtra("nomeProd")
        val precoProd = intent.getStringExtra("precoProd")
        val descProd = intent.getStringExtra("descProd")
        val categoriaProd = intent.getStringExtra("categoriaProd")
        val id = intent.getIntExtra("id", 0)

        binding.txtNomeProd.text = nomeProd
        binding.txtPreco.text = "Preço: R$ " + precoProd
        binding.txtDescricao.text = descProd
        binding.txtCatProd.text = "Categoria: " + categoriaProd
        Picasso.get().load("http://192.168.3.26/api/product/image/${id}").into(binding.imgProd)

        binding.qtde.text = "1"

        binding.btnMais.setOnClickListener {
            binding.qtde.setText((binding.qtde.text.toString().toInt() + 1).toString())
        }

        binding.btnMenos.setOnClickListener {
            binding.qtde.setText((binding.qtde.text.toString().toInt() - 1).toString())
        }


        binding.btnCart.setOnClickListener {
            val qtde = binding.qtde.text.toString().toInt()
            addAoCarrinho(id, qtde)
            //Snackbar.make(binding.linearLayout6, "${qtde}", Snackbar.LENGTH_LONG).show()
        }
    }

    fun addAoCarrinho(idProduto: Int, quantidade: Int) {
        val callback = object: Callback<Any> {
            override fun onResponse(call: Call<Any>, response: Response<Any>) {
                val resp = response.body()
                if(response.isSuccessful){
                    //Snackbar.make(binding.linearLayout6, "Produto adicionado com sucesso!", Snackbar.LENGTH_LONG).show()
                    Log.e("X", response.body().toString())
                } else {
                    Snackbar.make(binding.linearLayout6, "${response.code()}", Snackbar.LENGTH_LONG).show()
                }
            }
            override fun onFailure(call: Call<Any>, t: Throwable) {
                Snackbar.make(binding.linearLayout6, "Erro", Snackbar.LENGTH_LONG).show()
            }
        }
        var requisao = JsonObject()
        requisao.addProperty("product_id", idProduto)
        requisao.addProperty("quantity", quantidade)
        API().carrinho.adicionar_carrinho("Bearer ${Sessao.usuario?.token}", requisao).enqueue(callback)
    }
}