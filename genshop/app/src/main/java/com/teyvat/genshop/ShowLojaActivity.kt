package com.teyvat.genshop

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import androidx.recyclerview.widget.LinearLayoutManager
import com.google.android.material.snackbar.Snackbar
import com.squareup.picasso.Picasso
import com.teyvat.genshop.api.API
import com.teyvat.genshop.databinding.ActivityShowLojaBinding
import com.teyvat.genshop.models.Loja
import com.teyvat.genshop.models.Produto
import com.teyvat.genshop.utils.EnumTipoLista
import com.teyvat.genshop.utils.GenericRecyclerViewAdapter
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class ShowLojaActivity : AppCompatActivity() {
    lateinit var binding: ActivityShowLojaBinding
    lateinit var adapter: GenericRecyclerViewAdapter

    var id: Int = 0

    val listaProdLoja = arrayListOf<Produto>()

    override fun onCreate(savedInstanceState: Bundle?) {
        binding = ActivityShowLojaBinding.inflate(layoutInflater)
        super.onCreate(savedInstanceState)
        setContentView(binding.root)

        adapter = GenericRecyclerViewAdapter(listaProdLoja, EnumTipoLista.ListaProduto.valor)
        binding.recyclerView.adapter = adapter
        binding.recyclerView.layoutManager = LinearLayoutManager(this)

        val nomeLoja = intent.getStringExtra("nomeLoja")
        val tipoLoja = intent.getStringExtra("tipoLoja")
        val telefoneLoja = intent.getStringExtra("telefone")
        val celularLoja = intent.getStringExtra("celular")
        val enderecoLoja = intent.getStringExtra("endereco")
        id = intent.getIntExtra("id", 0)

        binding.txtNomeLoja.text = nomeLoja
        binding.txtTipoLoja.text = tipoLoja
        binding.txtCelular.text = celularLoja
        binding.txtTelefone.text = telefoneLoja
        binding.txtEndereco.text = enderecoLoja
        Picasso.get().load("http://192.168.3.26/api/store/image/${id}").into(binding.imgLoja)

        pegarProdutos()
    }

    fun pegarProdutos() {
        val callback = object: Callback<List<Produto>> {
            override fun onResponse(call: Call<List<Produto>>, response: Response<List<Produto>>) {
                if(response.isSuccessful){
                    val produtos = response.body()
                    produtos?.let {
                        listaProdLoja.clear()
                        listaProdLoja.addAll(it)
                        adapter.notifyDataSetChanged()
                    }
                } else {

                }
            }
            override fun onFailure(call: Call<List<Produto>>, t: Throwable) {
                Snackbar.make(binding.recyclerView, "Não foi possível carregar as lojas", Snackbar.LENGTH_LONG).show()
                Log.e("ListaLojasRvActivity", "carregarLojas", t)
            }
        }

        API().loja.lista_produto_loja(id).enqueue(callback)
    }
}