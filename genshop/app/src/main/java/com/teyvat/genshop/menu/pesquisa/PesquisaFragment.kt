package com.teyvat.genshop.menu.pesquisa

import android.os.Bundle
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.recyclerview.widget.LinearLayoutManager
import com.google.gson.JsonObject
import com.teyvat.genshop.R
import com.teyvat.genshop.api.API
import com.teyvat.genshop.databinding.FragmentPesquisaBinding
import com.teyvat.genshop.models.Loja
import com.teyvat.genshop.models.Produto
import com.teyvat.genshop.utils.EnumTipoLista
import com.teyvat.genshop.utils.GenericRecyclerViewAdapter
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response


class PesquisaFragment : Fragment() {
    lateinit var binding: FragmentPesquisaBinding
    lateinit var adapter: GenericRecyclerViewAdapter

    val listaProdutos = arrayListOf<Produto>()

    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?): View? {
        binding = FragmentPesquisaBinding.inflate(inflater)
        adapter = GenericRecyclerViewAdapter(listaProdutos, EnumTipoLista.ListaProduto.valor)
        binding.recyclerView.adapter = adapter
        binding.recyclerView.layoutManager = LinearLayoutManager(activity)

        requisicaoPesquisa("")

        binding.btnBusca.setOnClickListener {
            val busca = binding.editBuscaProd.text.toString()
            requisicaoPesquisa(busca)
        }

        binding.chipTodos.setOnClickListener {
            pesquisa_categoria("")
        }
        binding.chipArmasUtilitarios.setOnClickListener {
            pesquisa_categoria("Armas/Utilitários")
        }
        binding.chipComidasBebidas.setOnClickListener {
            pesquisa_categoria("Comidas/Bebidas")
        }
        binding.chipMuambas.setOnClickListener {
            pesquisa_categoria("Muambas")
        }
        binding.chipIngredientes.setOnClickListener {
            pesquisa_categoria("Ingredientes")
        }
        binding.chipPocoes.setOnCloseIconClickListener {
            pesquisa_categoria("Poções")
        }
        binding.chipDecoracoesMoveis.setOnClickListener {
            pesquisa_categoria("Decorações/Móveis")
        }
        binding.chipArvoresFlores.setOnClickListener {
            pesquisa_categoria("Árvores/Flores")
        }
        binding.chipIscasVaras.setOnClickListener {
            pesquisa_categoria("Iscas/Varas")
        }

        return binding.root
    }

    fun requisicaoPesquisa(busca: String){
        val callback = object : Callback<List<Produto>> {
            override fun onResponse(call: Call<List<Produto>>, response: Response<List<Produto>>) {
                if(response.isSuccessful){
                    val produtos = response.body()
                    produtos?.let {
                        listaProdutos.clear()
                        listaProdutos.addAll(it)
                        adapter.notifyDataSetChanged()
                    }
                } else {

                }
            }
            override fun onFailure(call: Call<List<Produto>>, t: Throwable) {
            }
        }
        var requisao = JsonObject()
        requisao.addProperty("name", busca)
        API().produto.pesquisar(requisao).enqueue(callback)
    }

    fun pesquisa_categoria(categoria: String){
        val callback = object : Callback<List<Produto>> {
            override fun onResponse(call: Call<List<Produto>>, response: Response<List<Produto>>) {
                if(response.isSuccessful){
                    val produtos = response.body()
                    produtos?.let {
                        listaProdutos.clear()
                        listaProdutos.addAll(it)
                        adapter.notifyDataSetChanged()
                    }
                } else {

                }
            }
            override fun onFailure(call: Call<List<Produto>>, t: Throwable) {
            }
        }
        var requisao = JsonObject()
        requisao.addProperty("name", categoria)
        API().produto.pesquisa_categoria(requisao).enqueue(callback)
    }

    companion object {
        @JvmStatic
        fun newInstance() = PesquisaFragment()
    }


}