package com.teyvat.genshop.menu.configuracoes

import com.teyvat.genshop.models.Endereco
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

        //adapter = GenericRecyclerViewAdapter(listaEnderecos, EnumTipoLista.ListaEndereco.valor)
        //binding.recyclerview.adapter = adapter
        //binding.recyclerview.layoutManager = LinearLayoutManager(activity)

        return binding.root
    }

    companion object {
        @JvmStatic
        fun newInstance() = EnderecosFragment()
    }
}