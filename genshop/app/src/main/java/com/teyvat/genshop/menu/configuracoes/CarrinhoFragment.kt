package com.teyvat.genshop.menu.configuracoes

import android.content.Intent
import android.os.Bundle
import android.util.Log
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.recyclerview.widget.LinearLayoutManager
import com.google.android.material.snackbar.Snackbar
import com.google.gson.JsonObject
import com.teyvat.genshop.CadastroClienteActivity
import com.teyvat.genshop.FinalizarPedidoActivity
import com.teyvat.genshop.R
import com.teyvat.genshop.ShowLojaActivity
import com.teyvat.genshop.api.API
import com.teyvat.genshop.databinding.FragmentCarrinhoBinding
import com.teyvat.genshop.menu.pesquisa.PedidosFragment
import com.teyvat.genshop.models.Compra
import com.teyvat.genshop.models.Loja
import com.teyvat.genshop.models.Produto
import com.teyvat.genshop.utils.EnumTipoLista
import com.teyvat.genshop.utils.GenericRecyclerViewAdapter
import com.teyvat.genshop.utils.Sessao
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class CarrinhoFragment : Fragment() {
    lateinit var binding: FragmentCarrinhoBinding
    lateinit var adapter: GenericRecyclerViewAdapter

    val listaCarrinho = arrayListOf<Produto>()

    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?): View? {
        binding = FragmentCarrinhoBinding.inflate(inflater)
        adapter = GenericRecyclerViewAdapter(listaCarrinho, EnumTipoLista.ListaCarrinho.valor)


        binding.recyclerView.adapter = adapter
        binding.recyclerView.layoutManager = LinearLayoutManager(activity)

        carregaCarrinho()

        binding.btnFinalizar.setOnClickListener {
            if(Sessao.endereco != null){
                finalizaCompra()
            } else {

            }
        }

        return binding.root
    }

    fun carregaCarrinho(){
        val callback = object: Callback<List<Produto>> {
            override fun onResponse(call: Call<List<Produto>>, response: Response<List<Produto>>) {
                if(response.isSuccessful){
                    val produtos = response.body()
                    produtos?.let {
                        listaCarrinho.clear()
                        listaCarrinho.addAll(it)
                        adapter.notifyDataSetChanged()
                    }
                } else {
                    val intent = Intent(binding.root.context, CadastroClienteActivity::class.java)
                    binding.root.context.startActivity(intent)
                }
            }
            override fun onFailure(call: Call<List<Produto>>, t: Throwable) {
                Snackbar.make(binding.recyclerView, "Não foi possível carregar os produtos do carrinho", Snackbar.LENGTH_LONG).show()
            }
        }
        API().carrinho.ver_carrinho("Bearer ${Sessao.usuario?.token}").enqueue(callback)
    }

    fun finalizaCompra(){
        val callback = object: Callback<Compra> {
            override fun onResponse(call: Call<Compra>, response: Response<Compra>) {
                if(response.isSuccessful){
                    val order = response.body()
                    Snackbar.make(binding.recyclerView, "Compra finalizada com sucesso", Snackbar.LENGTH_LONG).show()
                    val intent = Intent(binding.root.context, FinalizarPedidoActivity::class.java)
                    intent.putExtra("order", order)
                    binding.root.context.startActivity(intent)
                } else {
                    Snackbar.make(binding.recyclerView, "Não foi possível finalizar sua compra", Snackbar.LENGTH_LONG).show()
                    Log.e("FALHA", "${response.code()}")
                }
            }
            override fun onFailure(call: Call<Compra>, t: Throwable) {
                Snackbar.make(binding.recyclerView, "Não foi possível finalizar sua compra", Snackbar.LENGTH_LONG).show()
                Log.e("ERRO", "${t}")
            }
        }
        API().carrinho.finalizar_compra("Bearer ${Sessao.usuario?.token}").enqueue(callback)
    }

    companion object {
        @JvmStatic
        fun newInstance() = CarrinhoFragment()
    }
}