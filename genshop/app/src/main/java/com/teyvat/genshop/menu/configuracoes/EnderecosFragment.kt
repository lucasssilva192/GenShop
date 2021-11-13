package com.teyvat.genshop.menu.configuracoes

import com.teyvat.genshop.models.Address
import android.os.Bundle
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.core.view.isVisible
import androidx.recyclerview.widget.LinearLayoutManager
import com.teyvat.genshop.R
import com.teyvat.genshop.databinding.FragmentEnderecosBinding
import com.teyvat.genshop.databinding.ItemEnderecoBinding
import com.teyvat.genshop.utils.EnumTipoLista
import com.teyvat.genshop.utils.GenericRecyclerViewAdapter

class EnderecosFragment : Fragment() {
    lateinit var binding: FragmentEnderecosBinding
    lateinit var adapter: GenericRecyclerViewAdapter

    override fun onCreateView(inflater: LayoutInflater, container: ViewGroup?, savedInstanceState: Bundle?): View? {
        binding = FragmentEnderecosBinding.inflate(inflater)

        val listaEnderecos = listOf(
            Address(1, "04074-031","São Paulo","São Paulo","Avenida Moreira Guimarães","551", "Não"),
            Address(2, "08265-130","São Paulo","São Paulo","Rua João Barreiros","41", "Não"),
            Address(3, "04459-040","São Paulo","São Paulo","Avenida Teste","878645","Sim"),
            Address(4, "03239-080","São Paulo","São Paulo","Rua Doutor Nogueira de Noronha","2086", "Não")
        )
        adapter = GenericRecyclerViewAdapter(listaEnderecos, EnumTipoLista.ListaEndereco.valor)
        binding.recyclerview.adapter = adapter
        binding.recyclerview.layoutManager = LinearLayoutManager(activity)

        /*for (i in 1..10) {
            val itemBinding = ItemEnderecoBinding.inflate(layoutInflater)
            itemBinding.txtNomeEndereco.text = "Casa - ${i}"
            itemBinding.txtEndereco.text = "Av. Eng. Eusébio Stevaux, ${i} - Santo Amaro, São Paulo - SP, 04696-000"
            if(i != 7)
            {
                itemBinding.iconeAtivo.isVisible = false
            }
            binding.container.addView(itemBinding.root)
        }*/


        return binding.root
    }

    companion object {
        @JvmStatic
        fun newInstance() = EnderecosFragment()
    }
}