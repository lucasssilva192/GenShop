package com.teyvat.genshop

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import androidx.recyclerview.widget.LinearLayoutManager
import com.google.android.material.snackbar.Snackbar
import com.google.gson.JsonObject
import com.teyvat.genshop.api.API
import com.teyvat.genshop.databinding.ActivityFinalizarPedidoBinding
import com.teyvat.genshop.databinding.FragmentPedidosBinding
import com.teyvat.genshop.menu.MenuActivity
import com.teyvat.genshop.models.Compra
import com.teyvat.genshop.models.ProdCompra
import com.teyvat.genshop.models.Produto
import com.teyvat.genshop.utils.EnumTipoLista
import com.teyvat.genshop.utils.GenericRecyclerViewAdapter
import com.teyvat.genshop.utils.Sessao
import com.teyvat.genshop.utils.Utilitarios
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class FinalizarPedidoActivity : AppCompatActivity() {
    lateinit var binding: ActivityFinalizarPedidoBinding
    lateinit var adapter: GenericRecyclerViewAdapter

    val listaProdutos = arrayListOf<ProdCompra>()

    override fun onCreate(savedInstanceState: Bundle?) {
        binding = ActivityFinalizarPedidoBinding.inflate(layoutInflater)
        super.onCreate(savedInstanceState)
        Utilitarios.aplicarTema(this, delegate)
        setContentView(binding.root)

        adapter = GenericRecyclerViewAdapter(listaProdutos, EnumTipoLista.ListaPedidoProduto.valor)
        binding.recyclerView.adapter = adapter
        binding.recyclerView.layoutManager = LinearLayoutManager(this)

        val order = intent.getSerializableExtra("order") as? Compra
        var pagamento = " "

        binding.txtEndereco.text = "SERA SALVO NA SESSAO"
        binding.txtPreco.setText("Preço total: R$ " + order?.price)
        binding.txtNumPed.setText("Pedido #" + order?.id)
        binding.txtEndereco.setText("${Sessao.endereco?.address}, ${Sessao.endereco?.number} - ${Sessao.endereco?.city} - ${Sessao.endereco?.state}, ${Sessao.endereco?.cep}")

        carrega_carrinho(order?.id)

        binding.btnComprar.setOnClickListener {
            if(binding.chipBoleto.isChecked == true){
                pagamento = "Boleto"
            }
            if(binding.chipPix.isChecked == true){
                pagamento = "Pix"
            }
            finaliza_compra(order?.id, pagamento)
        }
    }

    fun carrega_carrinho(id: Int?){
        val callback = object: Callback<List<ProdCompra>> {
            override fun onResponse(call: Call<List<ProdCompra>>, response: Response<List<ProdCompra>>) {
                if(response.isSuccessful){
                    val produtos = response.body()
                    produtos?.let {
                        listaProdutos.clear()
                        listaProdutos.addAll(it)
                        adapter.notifyDataSetChanged()
                    }
                    Log.e("REQUISICAO DEU CERTO", response.body().toString())
                } else {
                    Log.e("REQUISICAO DEU MEIO CERTO", response.errorBody().toString())
                    Log.e("REQUISICAO DEU MEIO CERTO", response.code().toString())
                    Snackbar.make(binding.recyclerView, "Não foi possível carregar os produtos da compra, tente novamente", Snackbar.LENGTH_LONG).show()
                }
            }
            override fun onFailure(call: Call<List<ProdCompra>>, t: Throwable) {
                Log.e("REQUISICAO DEU MEIO ERRADO", "${t}")
                Snackbar.make(binding.recyclerView, "Não foi possível carregar os produtos da compra", Snackbar.LENGTH_LONG).show()
            }
        }
        var requisao = JsonObject()
        requisao.addProperty("order_id", id)
        API().carrinho.carrega_carrinho("Bearer ${Sessao.usuario?.token}", requisao).enqueue(callback)
    }

    fun finaliza_compra(id: Int?, pagto: String){
        val callback = object: Callback<Any> {
            override fun onResponse(call: Call<Any>, response: Response<Any>) {
                if(response.isSuccessful){
                    Log.e("REQUISICAO DEU CERTO", response.body().toString())
                    Snackbar.make(binding.recyclerView, "Pedido efetuado com sucesso", Snackbar.LENGTH_LONG).show()
                    val intent = Intent(binding.root.context, MenuActivity::class.java)
                    binding.root.context.startActivity(intent)
                } else {
                    Log.e("REQUISICAO DEU MEIO CERTO", response.code().toString())
                    Snackbar.make(binding.recyclerView, "Não foi possível fechar a compra, tente novamente", Snackbar.LENGTH_LONG).show()
                }
            }
            override fun onFailure(call: Call<Any>, t: Throwable) {
                Log.e("REQUISICAO DEU MEIO ERRADO", "${t}")
                Snackbar.make(binding.recyclerView, "Erro ao fechar compra", Snackbar.LENGTH_LONG).show()
            }
        }
        var requisao = JsonObject()
        requisao.addProperty("order_id", id)
        requisao.addProperty("pagto", pagto)
        requisao.addProperty("address", "${Sessao.endereco?.address} ${Sessao.endereco?.number}")
        API().carrinho.fecha_compra("Bearer ${Sessao.usuario?.token}", requisao).enqueue(callback)
    }
}