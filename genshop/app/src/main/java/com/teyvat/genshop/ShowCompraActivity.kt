package com.teyvat.genshop

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import androidx.recyclerview.widget.LinearLayoutManager
import com.google.android.material.snackbar.Snackbar
import com.google.gson.JsonObject
import com.teyvat.genshop.api.API
import com.teyvat.genshop.databinding.ActivityShowCompraBinding
import com.teyvat.genshop.models.Loja
import com.teyvat.genshop.models.ProdCompra
import com.teyvat.genshop.models.Produto
import com.teyvat.genshop.utils.EnumTipoLista
import com.teyvat.genshop.utils.GenericRecyclerViewAdapter
import com.teyvat.genshop.utils.Sessao
import com.teyvat.genshop.utils.Utilitarios
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class ShowCompraActivity : AppCompatActivity() {

    lateinit var binding: ActivityShowCompraBinding
    lateinit var adapter: GenericRecyclerViewAdapter

    val listaProdutos = arrayListOf<ProdCompra>()

    override fun onCreate(savedInstanceState: Bundle?) {
        binding = ActivityShowCompraBinding.inflate(layoutInflater)
        super.onCreate(savedInstanceState)
        Utilitarios.aplicarTema(this, delegate)
        setContentView(binding.root)

        adapter = GenericRecyclerViewAdapter(listaProdutos, EnumTipoLista.ListaPedidoProduto.valor)
        binding.recyclerView.adapter = adapter
        binding.recyclerView.layoutManager = LinearLayoutManager(this)

        val id = intent.getIntExtra("id", 0)
        val valor = intent.getStringExtra("price")
        val status = intent.getStringExtra("status")
        val endereco = intent.getStringExtra("address")
        val pagto = intent.getStringExtra("pagto")

        binding.txtSts.setText("Status: " + status)
        binding.txtEndereco.setText("Endereço de entrega: " + endereco)
        binding.txtPreco.setText("Valor final: " + valor)
        binding.txtNumPed.setText("Pedido #" + id.toString())
        binding.txtFormaPagto.setText("Pagamento: " + pagto)
        pegarProdutos(id)
    }

    fun pegarProdutos(id: Int) {
        val callback = object: Callback<List<ProdCompra>> {
            override fun onResponse(call: Call<List<ProdCompra>>, response: Response<List<ProdCompra>>) {
                if(response.isSuccessful){
                    Log.e("SHOW COMPRA", "${response.body()}")
                    val produtos = response.body()
                    produtos?.let {
                        listaProdutos.clear()
                        listaProdutos.addAll(it)
                        adapter.notifyDataSetChanged()
                    }
                } else {
                    Log.e("MEIO CERTO", "${response.code()}")
                }
            }
            override fun onFailure(call: Call<List<ProdCompra>>, t: Throwable) {
                Snackbar.make(binding.recyclerView, "Não foi possível carregar os produtos do pedido", Snackbar.LENGTH_LONG).show()
                Log.e("Show Compra", "carregarLojas", t)
            }
        }
        var requisao = JsonObject()
        requisao.addProperty("order_id", id)
        API().carrinho.prod_compra("Bearer ${Sessao.usuario?.token}", requisao).enqueue(callback)
    }
}