package com.teyvat.genshop.menu.pesquisa

import android.os.Bundle
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.recyclerview.widget.LinearLayoutManager
import com.google.android.material.snackbar.Snackbar
import com.teyvat.genshop.R
import com.teyvat.genshop.api.API
import com.teyvat.genshop.databinding.FragmentPedidosBinding
import com.teyvat.genshop.databinding.FragmentPesquisaBinding
import com.teyvat.genshop.models.Compra
import com.teyvat.genshop.models.Produto
import com.teyvat.genshop.utils.EnumTipoLista
import com.teyvat.genshop.utils.GenericRecyclerViewAdapter
import com.teyvat.genshop.utils.Sessao
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class PedidosFragment : Fragment() {

    lateinit var binding: FragmentPedidosBinding
    lateinit var adapter: GenericRecyclerViewAdapter

    val listaCompras = arrayListOf<Compra>()

    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?): View? {
        binding = FragmentPedidosBinding.inflate(inflater)
        adapter = GenericRecyclerViewAdapter(listaCompras, EnumTipoLista.ListaCompra.valor)
        binding.recyclerView.adapter = adapter
        binding.recyclerView.layoutManager = LinearLayoutManager(activity)

        carregaCompras()

        return binding.root
    }

    fun carregaCompras(){
        val callback = object: Callback<List<Compra>> {
            override fun onResponse(call: Call<List<Compra>>, response: Response<List<Compra>>) {
                if(response.isSuccessful){
                    val compras = response.body()
                    compras?.let {
                        listaCompras.clear()
                        listaCompras.addAll(it)
                        adapter.notifyDataSetChanged()
                    }
                } else {

                }
            }
            override fun onFailure(call: Call<List<Compra>>, t: Throwable) {
                Snackbar.make(binding.recyclerView, "Não foi possível carregar os produtos do carrinho", Snackbar.LENGTH_LONG).show()
            }
        }
        API().carrinho.minhas_compras("Bearer ${Sessao.usuario?.token}").enqueue(callback)
    }

    companion object {
        @JvmStatic
        fun newInstance() = PedidosFragment()
    }
}