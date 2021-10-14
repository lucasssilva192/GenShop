package com.teyvat.genshop.menu.configuracoes

import android.os.Bundle
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import com.teyvat.genshop.R

class SuporteFragment : Fragment() {

    override fun onCreateView(
        inflater: LayoutInflater, container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        // Inflate the layout for this fragment
        return inflater.inflate(R.layout.fragment_suporte, container, false)
    }

    companion object {
        @JvmStatic
        fun newInstance() = SuporteFragment()
    }
}