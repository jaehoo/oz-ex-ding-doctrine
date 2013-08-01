<?php
///**
// * Created by JetBrains PhpStorm.
// * User: jaehoo
// * Date: 13/07/13
// * Time: 13:04
// * To change this template use File | Settings | File Templates.
// */
//
//namespace Model\Persistence;
//
//
///** @Entity */
//class Comment
//{
//    /** @Id @GeneratedValue @Column(type="string") */
//    private $id;
//
//    /**
//     * Bidirectional - Many comments are favorited by many users (INVERSE SIDE)
//     *
//     * @ManyToMany(targetEntity="User", mappedBy="favorites")
//     */
//    private $userFavorites;
//
//    /**
//     * Bidirectional - Many Comments are authored by one user (OWNING SIDE)
//     *
//     * @ManyToOne(targetEntity="User", inversedBy="commentsAuthored")
//     */
//    private $author;
//}